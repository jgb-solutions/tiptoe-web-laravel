const { words } = require("lodash")

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
  ],
  darkMode: false,
  theme: {
    extend: {
      colors: {
        primary: '#7993bc',
        black: '#010101',
        antiqueBrass: '#cb9478',
        tundora: '#434343',
        apricotPeach: '#fbd7bb',
        shipCove: '#7993bc',
        nightshadz: '#ab3954',
        gray: '#F4F4F4'
      },
      fontFamily: {
        body: ['Montserrat'],
      },
    
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
