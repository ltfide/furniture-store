/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        container: {
            center: true,
        },
        extend: {
            keyframes: {
                "fade-in-down": {
                    from: {
                        top: 0,
                    },
                    to: {
                        top: 100,
                    },
                },
            },
            animation: {
                "fade-in-down": "fade-in-down 0.2s ease-in-out both",
            },
        },
    },
    plugins: [],
};
