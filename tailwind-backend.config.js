const colors = require("tailwindcss/lib/public/colors");
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                purple: colors.red,
            },
        },
        container: {
            center: true,
        }
    },
    plugins: [
        require('tailwindcss-debug-screens'),
    ],
}
