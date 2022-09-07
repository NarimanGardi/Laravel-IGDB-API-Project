/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            spacing: {
                '30': '300px',
                '0.15': '15px',
                '0.20': '20px',
                '12/100': '12%',
                '88/100': '88%',
                '7/100': '7%',
                '93/100': '93%',
                '0.6': '6px',
                '0.8': '8px',
              }
        },
        spinner: (theme) => ({
            default: {
                color: '#dae1e7', // color you want to make the spinner
                size: '1em', // size of the spinner (used for both width and height)
                border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
                speed: '500ms', // the speed at which the spinner should rotate
            },
            // md: {
            //   color: theme('colors.red.500', 'red'),
            //   size: '2em',
            //   border: '2px',
            //   speed: '500ms',
            // },
        }),
    },
    plugins: [
        require('tailwindcss-spinner')({
            className: 'spinner',
            themeKey: 'spinner'
        }),
    ],

}
