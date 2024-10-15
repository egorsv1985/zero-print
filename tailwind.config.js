/** @type {import('tailwindcss').Config} */
export default {
	content: ['./**/*.html'],
	safelist: [],
	theme: {
		extend: {
			fontFamily: {
				Onest: ['Onest', 'sans-serif'],
			},
		},
		lineHeight: {
			tight: '1.2',
			normal: '1',
		},
		boxShadow: {
			inner:
				'0 2px 8px 0 rgba(71, 74, 89, 0.08), 0 2px 2px 0 rgba(71, 74, 89, 0.02);',
		},
		borderRadius: {
			none: '0',			
			full: '9999px',			
			standard: '20px',
			large: '30px',
		},
		letterSpacing: {
			wider: '.01em',
		},
		 fontSize: {
      sm: '0.8rem',
      base: '1rem',
			lg: '1.125rem',
      xl: '1.25rem',
      '2xl': '1.563rem',
      '3xl': '2rem',
      '4xl': '2.25rem',
      '5xl': '3.052rem',
			'6xl': 'var(--6xl)',
    },
		colors: {
			primary: '#3742f3',
			secondary: '#f9f9f9',
			success: '#9B9B9B',
			main: '#e4e9ee',
			txt_blue: '#3742f3',
			dark: '#333',
			txt_dark: '#333',
			white: '#fff',
		},
		listStyleType: {
			none: 'none',
			disc: 'disc',
		},
		container: {
			center: true,
		},
	},
	plugins: [
		require('flowbite/plugin'),
		function ({ addComponents }) {
			addComponents({
				'.container': {
					maxWidth: '100%',
					'@screen sm': {
						maxWidth: '640px',
					},
					'@screen md': {
						maxWidth: '768px',
					},
					'@screen lg': {
						maxWidth: '1024px',
					},
					'@screen xl': {
						maxWidth: '1304px',
					},
				},
			})
		},
	],
}
