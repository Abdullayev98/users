    module.exports = {
        theme: {
            extend: {
                backgroundImage: {
                    'hero-pattern': "url('{{asset('/images/download_hand_User.png')}}')",
                    'footer-texture': "url('https://wallpapercave.com/wp/wp4002616.jpg')",
                },
                textColor: {
                    'primary': '#3490dc',
                    'secondary': '#ffed4a',
                    'danger': '#e3342f',
                    'whiteblue': '#80e6ff',
                }
            }
        },
        plugins: [
            require('@tailwindcss/forms')({
                strategy: 'class',
            }),
        ],
    }
