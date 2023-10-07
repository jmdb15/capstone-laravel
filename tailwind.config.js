/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        container: {
            center: true,
        },
        fontFamily: {
            sans: ["Inter", ...defaultTheme.fontFamily.sans], 
            stock: [defaultTheme.fontFamily.sans],
        },
        screens: {
            sm: `480px`,
            md: `780px`,
            lg: `1090px`,
            xl: `1440px`,
        },
        extend: {
            fontFamily: {
                raleway: [`Raleway`],
            },
            colors: {
                brightRed: "hsl(12, 88%, 59%)",
                brightRedLight: "hsl(12, 88%, 69%)",
                brightRedSupLight: "hsl(12, 88%, 95%)",
                darkBlue: "hsl(228, 39%, 23%)",
                darkGrayishBlue: "hsl(227, 12%, 61%)",
                veryDarkBlue: "hsl(233, 12%, 13%)",
                veryPaleRed: "hsl(13, 100%, 96%)",
                veryLightGray: "hsl(0, 0%, 98%)",
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
