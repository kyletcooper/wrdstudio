/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors');

module.exports = {
  content: ["*.{html,php}", "./**/*.{html,php}"],

  theme: {
    colors: {
      'gray': colors.slate,

      'white': '#FFFFFF',

      'theme': {
        50: 'rgb(var(--color-theme-50-rgb) / <alpha-value>)',
        100: 'rgb(var(--color-theme-100-rgb) / <alpha-value>)',
        200: 'rgb(var(--color-theme-200-rgb) / <alpha-value>)',
        300: 'rgb(var(--color-theme-300-rgb) / <alpha-value>)',
        400: 'rgb(var(--color-theme-400-rgb) / <alpha-value>)',
        500: 'rgb(var(--color-theme-500-rgb) / <alpha-value>)',
        600: 'rgb(var(--color-theme-600-rgb) / <alpha-value>)',
        700: 'rgb(var(--color-theme-700-rgb) / <alpha-value>)',
        800: 'rgb(var(--color-theme-800-rgb) / <alpha-value>)',
        900: 'rgb(var(--color-theme-900-rgb) / <alpha-value>)',
      },

      'red': '#EF3838',
      'orange': '#F8841E',
      'green': '#85A700',
      'blue': '#1E92F8',
      'pink': '#C60295',
    },

    fontFamily: {
      sans: ['Montserrat', 'Poppins', 'Helvetica', 'sans-serif'],
    },

    container: {
      center: true,
      padding: '2rem',
    },

    extend: {
      backgroundImage: {
        'grid': "var(--bg-grid-url)"
      },
      backgroundSize: {
        '100%': '100%'
      }
    },
  },

  darkMode: 'class',

  plugins: [],
}
