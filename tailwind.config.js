/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
      extend: {},
    },
    plugins: [],
  }



  // tailwind.config.js
module.exports = {
    content: [
      // './src/**/*.{html,js}',
        'node_modules/preline/dist/*.js',
    ],
    plugins: [
      // require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
  }