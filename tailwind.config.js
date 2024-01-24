const colors = require('tailwindcss/colors');
const plugin = require('tailwindcss/plugin');

module.exports = {
	content: ["./src/**/*.php", "./assets/src/js/admin/*.js"],
	theme: {
		extend: {},
	},
	darkMode: 'class',
	theme: {
		container: {
			center: true,
			padding: '1rem',
		},
		extend: {
			colors: {
				yellow: colors.amber, // We started usign `yellow` in v2 but it was renamed to `amber` in v3 https://tailwindcss.com/docs/upgrade-guide#removed-color-aliases
				gray: colors.slate,
				'gray-950': 'rgb(13, 18, 30)',
				'gray-850': 'rgb(26, 32, 44)',
				'gray-825': 'rgb(37, 47, 63)',
			},
			spacing: {
				44: '11rem',
			},
			width: {
				content: 'fit-content',
			},
			opacity: {
				15: '0.15',
			},
			zIndex: {
				9: 9,
			},
			maxWidth: {
				'2xs': '15rem',
				'3xs': '12rem',
			},
			transitionProperty: {
				padding: 'padding',
			},
		},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
	corePlugins: {
		preflight: false,
	},
};
