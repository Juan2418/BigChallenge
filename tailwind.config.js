module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            container: {
                padding: {
                    DEFAULT: '1rem',
                    sm: '2rem',
                    lg: '4rem',
                    xl: '5rem',
                    '2xl': '6rem',
                },

            },
            gridTemplateColumns: {
                // Complex site-specific column configuration
                'main': '15% 85%',
                'category-product': '40% 60%',
                'product': '70% 30%'
            },
            minHeight: {
                '0': '0',
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%',
                'full': '100%',
            },
            colors: {
                primary: "#1C211D",
                secondary: "#CBB007"
            },
        },
    },
    variants: {
        extend: {
            scale: ['active', 'group-hover'],
            animation: ['responsive', 'motion-safe', 'motion-reduce', 'hover'],
            stroke: ['hover', 'focus'],
        },
    },
    plugins: [],
}
