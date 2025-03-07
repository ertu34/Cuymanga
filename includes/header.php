<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    darkMode: 'class',
    theme: {
      extend: {
        colors: {
          primary: {
            DEFAULT: '#f97316',
            50: '#fff7ed',
            100: '#ffedd5',
            200: '#fed7aa',
            300: '#fdba74',
            400: '#fb923c',
            500: '#f97316',
            600: '#ea580c',
            700: '#c2410c',
            800: '#9a3412',
            900: '#7c2d12',
            950: '#431407',
          },
        },
        animation: {
          'fade-in': 'fadeIn 0.5s ease-in-out',
          'slide-up': 'slideUp 0.5s ease-in-out',
          'slide-down': 'slideDown 0.5s ease-in-out',
          'slide-left': 'slideLeft 0.5s ease-in-out',
          'slide-right': 'slideRight 0.5s ease-in-out',
          'scale-in': 'scaleIn 0.5s ease-in-out',
          'bounce-in': 'bounceIn 0.5s ease-in-out',
        },
        keyframes: {
          fadeIn: {
            '0%': {
              opacity: '0'
            },
            '100%': {
              opacity: '1'
            },
          },
          slideUp: {
            '0%': {
              transform: 'translateY(20px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateY(0)',
              opacity: '1'
            },
          },
          slideDown: {
            '0%': {
              transform: 'translateY(-20px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateY(0)',
              opacity: '1'
            },
          },
          slideLeft: {
            '0%': {
              transform: 'translateX(20px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateX(0)',
              opacity: '1'
            },
          },
          slideRight: {
            '0%': {
              transform: 'translateX(-20px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateX(0)',
              opacity: '1'
            },
          },
          scaleIn: {
            '0%': {
              transform: 'scale(0.9)',
              opacity: '0'
            },
            '100%': {
              transform: 'scale(1)',
              opacity: '1'
            },
          },
          bounceIn: {
            '0%': {
              transform: 'scale(0.3)',
              opacity: '0'
            },
            '50%': {
              transform: 'scale(1.05)',
              opacity: '0.9'
            },
            '70%': {
              transform: 'scale(0.9)',
              opacity: '1'
            },
            '100%': {
              transform: 'scale(1)',
              opacity: '1'
            },
          },
        },
      },
    },
  }
</script>
<style type="text/css">
  .line-clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}::-webkit-scrollbar{width:8px}::-webkit-scrollbar-track{background:rgba(0,0,0,.1)}::-webkit-scrollbar-thumb{background:rgba(249,115,22,.5);border-radius:4px}::-webkit-scrollbar-thumb:hover{background:rgba(249,115,22,.8)}.navbar-float{transition:transform .3s}.navbar-hidden{transform:translateY(-100%)}.animate-item{opacity:0}.animate-item.animate-fade-in{animation:.5s ease-in-out forwards fadeIn}.custom-slider{position:relative;width:100%;height:100%;overflow:hidden}.slider-content,.slider-image,.slider-item{position:absolute;left:0;width:100%}.slider-item{top:0;height:100%;transition:.5s}.slider-image{top:0;height:100%;background-size:cover;background-position:center}.slider-content{bottom:0;padding:2rem;background:linear-gradient(to top,rgba(0,0,0,.8),transparent);color:#fff}
</style>