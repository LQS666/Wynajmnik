module.exports = {
  theme: {
    fontFamily: {
      'sans': ['Roboto', 'Arial', 'sans-serif'],
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

        'purple-main': '#eeedfc',
        'purple-second': '#6c63ff',
        'purple-third': '#f8f9ff',
        'green-main': '#2ecc71',
        'gray-main': '#fcfcfc',
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
