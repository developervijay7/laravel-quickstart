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
                accent: '#0872b4',
            },
        },
        container: {
            center: true,
        }
    },
    plugins: [
        require('tailwindcss-debug-screens'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
    ],
}
