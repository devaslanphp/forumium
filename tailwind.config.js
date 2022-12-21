/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      './node_modules/flowbite/**/*.js'
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('flowbite/plugin'),
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
  ],
}
