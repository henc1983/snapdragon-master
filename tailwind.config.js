module.exports = {
  importsnt: true,
  purge: [
    './*.*',
    './*.php',
    './**/*.php',
    './**/*.*',
    './*.js',
    './*.html',
    './src/**/*.js'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
