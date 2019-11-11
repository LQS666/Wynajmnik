module.exports = {
  theme: {
    fontFamily: {
      'sans': ['Montserrat', 'Arial', 'sans-serif'],
    },
    extend: {
      opacity: {
        '10': '0.1',
        '90': '0.9',
      },
      maxWidth: {
        xxs: 'calc(100% / 2 - 8px)',
      },
      colors: {
        transparent: 'transparent',

        black: '#000',
        white: '#fff',

        'purple-main': '#EEEDFC',
        'purple-second': '#6C63FF',
      },
    },
  },
  variants: {},
  plugins: [
    function ({
      addUtilities
    }) {
      const newUtilities = {
        '.transition': {
          transition: '.5s',
        }
      };
    },
  ],
}
