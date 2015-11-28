module.exports = function(grunt) {

  grunt.initConfig({

    /*
    |-------------------------------------------------------
    | Watch
    |-------------------------------------------------------
    | watch for any SASS file changes 
    |
    */

    watch: {
      css: {
        files: ['**/*.sass'],
        tasks: ['sass'],
        options: {
          spawn: false,
        },
      },
    },

    /*
    |-------------------------------------------------------
    | SASS/SCSS
    |-------------------------------------------------------
    | compile SCSS/SASS to CSS 
    |
    */

    sass: {
      dist: {
        files: {
          'assets/css/main.min.css': 'assets/css/main.sass'
        }
      }
    }
    
  });

  /*
  |-------------------------------------------------------
  | Load Tasks
  |-------------------------------------------------------
  */

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  /*
  |-------------------------------------------------------
  | Register Tasks
  |-------------------------------------------------------
  */
  
  grunt.registerTask('default', ['watch']);

};