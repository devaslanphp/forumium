<div class="w-full flex flex-col gap-3">
    @if($user && $user->id == auth()->user()->id && $user->discussionVisits()->count())

        <span class="font-medium text-slate-700 text-lg">Visits presentation</span>

        <div class="w-full">
            <div id="chartdiv"></div>
        </div>

        @push('scripts')
            <style>
                #chartdiv {
                    width: 100%;
                    height: 600px
                }
            </style>

            <script src="{{ asset('vendor/amcharts/index.js') }}"></script>
            <script src="{{ asset('vendor/amcharts/map.js') }}"></script>
            <script src="{{ asset('vendor/amcharts/worldLow.js') }}"></script>
            <script src="{{ asset('vendor/amcharts/Animated.js') }}"></script>

            <script>
                am5.ready(function () {

                    var data = {!! json_encode($data) !!};

                    var root = am5.Root.new("chartdiv");
                    root.setThemes([am5themes_Animated.new(root)]);

                    var chart = root.container.children.push(am5map.MapChart.new(root, {
                        "wheelY": "none"
                    }));

                    var polygonSeries = chart.series.push(
                        am5map.MapPolygonSeries.new(root, {
                            geoJSON: am5geodata_worldLow,
                            exclude: ["AQ"]
                        })
                    );

                    var bubbleSeries = chart.series.push(
                        am5map.MapPointSeries.new(root, {
                            valueField: "value",
                            calculateAggregates: true,
                            polygonIdField: "id"
                        })
                    );

                    var circleTemplate = am5.Template.new({});

                    bubbleSeries.bullets.push(function (root, series, dataItem) {
                        var container = am5.Container.new(root, {});

                        var circle = container.children.push(
                            am5.Circle.new(root, {
                                radius: 20,
                                fillOpacity: 0.7,
                                fill: am5.color(0xff0000),
                                cursorOverStyle: "pointer",
                                fontSize: 11,
                                tooltipText: `{name}: [bold]{value}[/]`
                            }, circleTemplate)
                        );

                        var countryLabel = container.children.push(
                            am5.Label.new(root, {
                                text: "{name}",
                                paddingLeft: 5,
                                populateText: true,
                                fontWeight: "bold",
                                fontSize: 11,
                                centerY: am5.p50
                            })
                        );

                        circle.on("radius", function (radius) {
                            countryLabel.set("x", radius);
                        })

                        return am5.Bullet.new(root, {
                            sprite: container,
                            dynamic: true
                        });
                    });

                    bubbleSeries.bullets.push(function (root, series, dataItem) {
                        return am5.Bullet.new(root, {
                            sprite: am5.Label.new(root, {
                                text: "{value.formatNumber('#.')}",
                                fill: am5.color(0xffffff),
                                populateText: true,
                                centerX: am5.p50,
                                centerY: am5.p50,
                                textAlign: "center"
                            }),
                            dynamic: true
                        });
                    });


                    // minValue and maxValue must be set for the animations to work
                    bubbleSeries.set("heatRules", [
                        {
                            target: circleTemplate,
                            dataField: "value",
                            min: 10,
                            max: 50,
                            minValue: 0,
                            maxValue: 100,
                            key: "radius"
                        }
                    ]);

                    bubbleSeries.data.setAll(data);

                    updateData();

                    function updateData() {
                        for (var i = 0; i < bubbleSeries.dataItems.length; i++) {
                            const countryName = window.am5geodata_worldLow.features.filter(item => item.id === data[i].id)[0]
                            if(countryName) {
                                bubbleSeries.data.setIndex(i, {
                                    value: data[i].value,
                                    id: data[i].id,
                                    name: countryName.properties.name
                                })
                            }
                        }
                    }


                }); // end am5.ready()
            </script>
        @endpush
    @endif
</div>
