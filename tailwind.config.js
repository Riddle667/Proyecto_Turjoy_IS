/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors:{
          'green-custom': '#2ECC71',
          'green-custom-correct-rows': '#A8E6CF',
          'blue-custom': {
            '50':'#0A74DA',
            '100':'#2A49FF'
          },
          'gray-custom': {
            '50':'#333333',
            '100':'#F4F4F4',
            '150': '#EAEAEA'
          },
          'red-custom':{
            '50': '#FF8A80',
            '100': '#FF6B6B'
          },
          'yellow-custom':{
            '50': '#E4E6A8'
          }
        },
        fontFamily: {

          'mulish': 'sans-serif'

        },



      },
    },
    plugins: [
      require('flowbite/plugin')
  ],



  }
