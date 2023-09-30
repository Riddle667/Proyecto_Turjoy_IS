/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors:{
          'green-custom': '#2ECC71',
          'blue-custom': {
            '50':'#0A74DA',
            '100':'#2A49FF'
          },
          'gray-custom': {
            '50':'#333333',
            '100':'#F4F4F4'
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
  
