import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import { capitalize } from "vue";
import theme from "tailwindcss/defaultTheme";

const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    plugins: [require("@tailwindcss/typography"), require("daisyui")],

    // daisyUI config (optional - here are the default values)
    daisyui: {
        themes: [
            {
                CustomDarkTheme: {
                    primary: "#60a5fa",
                    secondary: "#e2e8f0",
                    accent: "#38bdf8",
                    neutral: "#1e293b",
                    "base-100": "#0f172a",
                    "base-200": "#1e293b",
                    "base-300": "#334155",
                    info: "#38bdf8",
                    success: "#2dd4bf",
                    warning: "#facc15",
                    error: "#f87171",
                },
                CustomLightTheme: {
                    primary: "#2563eb",
                    secondary: "#475569",
                    accent: "#0ea5e9",
                    neutral: "#e2e8f0",
                    "base-100": "#f1f5f9",
                    "base-300": "#e2e8f0",
                    "base-200": "#cbd5e1",
                    info: "#06b6d4",
                    success: "#14b8a6",
                    warning: "#eab308",
                    error: "#f97316",
                },
            },
            "dark",
            "light",
        ],
        darkTheme: "CustomDarkTheme", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
        themeRoot: ":root", // The element that receives theme color CSS variables
    },

    theme: {
        extend: {
            fontFamily: {
                body: [
                    "Lato",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
                sans: [
                    "Lato",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            colors: {
                main: colors.blue,
                minor: colors.zinc,
                body: colors.slate,
                brown: {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                attribute: colors.yellow,
                campaign: colors.stone,
                capitalize: colors.slate,
                classe: colors.cyan,
                condition: colors.red,
                consumable: colors.orange,
                creature: colors.emerald,
                item: colors.indigo,
                mob: colors.pink,
                npc: colors.green,
                ressource: colors.sky,
                scenario: colors.neutral,
                shop: colors.amber,
                specialization: colors.lime,
                spell: colors.violet,
                user: colors.blue,
                page: colors.zinc,
                section: colors.zinc,
                force: {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                strong: {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                terre: {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                intel: colors.red,
                feu: colors.red,
                agi: colors.green,
                air: colors.green,
                chance: colors.blue,
                eau: colors.blue,
                vitality: colors.amber,
                sagesse: colors.violet,
                life: colors.lime,
                level: colors.zinc,
                master_bonus: colors.orange,
                time_before_use_again: colors.slate,
                casting_time: colors.gray,
                dodge_pa: colors.sky,
                dodge_pm: colors.emerald,
                po: colors.cyan,
                "po-editable": colors.slate,
                pa: colors.blue,
                pm: colors.green,
                "cast-per-turn": colors.purple,
                "cast-per-target": colors.indigo,
                "sight-line": colors.indigo,
                "number-between-two-cast": colors.pink,
                ini: colors.violet,
                invocation: colors.amber,
                touch: colors.gray,
                actif: colors.amber,
                twohands: colors.gray,
                kamas: colors.yellow,
                ca: colors.gray,
                fuite: colors.lime,
                tacle: colors.sky,
                neutre: colors.neutral,
                shield: colors.neutral,
                mastery: colors.stone,
                expertise: {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                "res-neutre": colors.neutral,
                "res-terre": {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                "res-air": colors.green,
                "res-feu": colors.red,
                "res-eau": colors.blue,
                "res-do-neutre": colors.neutral,
                "res-do-terre": {
                    50: "#fdf8f6",
                    100: "#f2e8e5",
                    200: "#eaddd7",
                    300: "#e0cec7",
                    400: "#d2bab0",
                    500: "#bfa094",
                    600: "#a18072",
                    700: "#977669",
                    800: "#846358",
                    900: "#43302b",
                },
                "res-do-air": colors.green,
                "res-do-feu": colors.red,
                "res-do-eau": colors.blue,
            },
        },
    },
};