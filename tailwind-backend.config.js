const colors = require("tailwindcss/lib/public/colors");
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: '#00a0e3',
                secondary: '#ef7f1a',
                alternate: '#DDDDDD',
                accent: '#e31e24',
            },
        },
    },
    plugins: [
        require('tailwindcss-debug-screens'),
    ],
}
