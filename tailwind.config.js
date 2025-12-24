/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./app/Livewire/**/*Table.php",
        './vendor/power-components/livewire-powergrid/resources/views/**/*.blade.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],
    theme: {
        extend: {
            colors: {
                primary: "#3b82f6",
                primary_hover: "#2563eb",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
    ],
}