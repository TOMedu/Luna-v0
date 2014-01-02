$( document ).ready( function() {

    // Our namespace
    var snake = function() {

        /**
         * canvas
         *
         * Selects canvas element via ID canvas.
         * Canvas holds our drawing plane.
         *
         * @type DOM object
         */
        var canvas = document.getElementById( 'canvas' );

        /**
         * draw
         *
         * The drawing plane for canvas. This is what we manipulate when
         * drawing/clearing stuff. Example:
         *
         *      draw.fillRect( 20, 20, 100, 100 );
         *
         *      Draws a rectangle at x:20, y:20 with a width of 100px and a height
         *      of 100px.
         */
        var draw = canvas.getContext( '2d' );

        /**
         * Unit
         *
         * This is the 'unit' of measure that defines the grid of our snake
         * game.
         */
        var unit = 20;

        /**
         * Coordinates
         *
         * Array holds x and y coordinates
         */
        var coords = new Array();
        coords = generateRandomCoords();

        /**
         * tock
         *
         * Bool that helps keep track of whether coords have been modified but
         * tick hasn't updated yet.
         */
        var tock = true;

        /**
         * keys
         *
         * Array holds a list of keycodes
         *
         * [ w, up arr ], [ a, left arr ], [ s, down arr ], [ d, right arr ]
         */
        var keys = [ [ 87, 38 ], [ 37, 65 ], [ 40, 83 ], [ 39, 68 ] ];

        /**
         * direction
         *
         * String keeps track of direction.
         *
         * Up    : 'up'
         * Left  : 'left'
         * Down  : 'down'
         * Right : 'right'
         *
         */
        var direction = 'right';

        /**
         * Past coordinates
         *
         * Array holds past coordinates for snake's head. The segments use this
         * for positioning.
         */
        var pastCoords = new Array();

        /**
         * segments
         *
         * Array used to keep track of the number of body segments the snake
         * has.
         */
        var segments = new Array();
        segments.push( '1' ); // Initial body

        /**
         * fruit exists
         *
         * If fruit exists: bool should be true.
         */
        var fruitExists = false;

        /**
         * fruit coordinates
         *
         * Array contains the fruit's coordinates.
         *
         * @values array[ x, y ];
         */
        var fruitCoords = new Array();

        /**
         * tick speed
         *
         * Int controls how fast the game "ticks". Starts at 100
         */
        var tickSpeed = 100;

        /**
         * Score Increment
         *
         * The amount the score is incremented for every fruit eaten
         */
        var scoreIncrement = 1;

        /**
         * Player's Score
         *
         * Int keeps track of player's current score
         */
        var score = 0;

        /**
         * high score
         *
         * Int keeps track of player's highest score
         */
        var highScore = 0;

        /**
         * Change Direction
         *
         * Modifies direction based on key press. Only listens to one keypress
         * per tock (reset in tick()).
         */
        function changeDirection( e ) {

            /**
             * Loop through all recorded keycodes in the keys array. If the key
             * pressed matches one of the keycodes then we'll prevent its
             * default function.
             */
            for( i = 0; i < keys.length; i++ ) {
                if( e.which == keys[i][0] || e.which == keys[i][1] ) {
                    e.preventDefault();
                }
            }

            if( tock ) {

                /**
                 * Check the keycode for the pressed key against the keys in our
                 * array.
                 */
                if( e.which == keys[0][0] || e.which == keys[0][1] ) { // Up
                    direction = 'up';
                } else if( e.which == keys[1][0] || e.which == keys[1][1] ) { // Left
                    direction = 'left';
                } else if( e.which == keys[2][0] || e.which == keys[2][1] ) { // Down
                    direction = 'down';
                } else if( e.which == keys[3][0] || e.which == keys[3][1] ) { // Right
                    direction = 'right';
                }

                tock = false;
            }
        }

        /**
         * Generate Random Coords
         *
         * Generates random x & y coordinates in multiples of our 'unit'.
         *
         * @return array[ int, int ]
         */
        function generateRandomCoords() {
            /**
             * The functions:
             * Math.round() is used to round a number to its nearest whole
             * number. We do this because pixels can only be whole numbers.
             *
             * Math.floor rounds the number *down* to its nearest whole number.
             *
             * Math.random() generates a random number between 0 and 1.
             *
             * What's going on:
             *
             *      We want to generate a random number between 0 and the width
             *      of the canvas.
             *
             *      If we just multipled Math.random() by
             *      canvas.width we might get a number at the extreme right of
             *      the canvas. Shapes are drawn from the top-left, so an
             *      x-coordinate at the far right of the canvas will cause our
             *      shape to be drawn off-screen. To counter this, we remove
             *      almost an entire unit's value from the canvas.width value.
             *
             *      Math.random() * (canvas.width - ( unit - 1 ) )
             *
             *
             *      Once we've got our base value, we round it down to a whole
             *      number and then divide that by our unit, in turn rounding
             *      that to a whole number. The reason we do this is because we
             *      only want to generate values that are multiples of our unit.
             *
             *      Math.round(
             *          Math.floor(
             *              Math.random() * (
             *                  canvas.width - ( unit - 1 )
             *              )
             *          )
             *          / unit
             *      )
             *
             *      To finish we then multiply this rounded figure up again by
             *      the unit so we have a value that can represent any point on
             *      the canvas given that it's a multiple of our unit.
             *
             *      Math.round(
             *          Math.floor(
             *              Math.random() * (
             *                  canvas.width - ( unit - 1 )
             *              )
             *          )
             *          / unit
             *      )
             *      * unit;
             */
            var x = Math.round( Math.floor( Math.random() * ( canvas.width  - ( unit - 1 ) ) ) / unit ) * unit;
            var y = Math.round( Math.floor( Math.random() * ( canvas.height - ( unit - 1 ) ) ) / unit ) * unit;

            return [ x, y ];
        }

        /**
         * Update Coordinates
         *
         * Moves snake's head based on direction. Also moves snake's head to the
         * other side of the canvas if the next coordinates cause it to go
         * off-screen.
         *
         * @param array[x, y]
         */
        function updateCoords( origin ) {

            updatePastCoords();

            if( direction == 'up' ) {
                origin[1] -= unit;
            } else if( direction == 'left' ) {
                origin[0] -= unit;
            } else if( direction == 'down' ) {
                origin[1] += unit;
            } else if( direction == 'right' ) {
                origin[0] += unit;
            }

            // Reset snakes head if it has gone out of bounds
            if( origin[0] < 0 ) {
                origin[0] = canvas.width - unit;
            } else if( origin[0] + unit > canvas.width ) {
                origin[0] = 0; // No need to add unit because head is drawn from topLeft
            }

            if( origin[1] < 0 ) {
                origin[1] = canvas.height - unit;
            } else if( origin[1] + unit > canvas.height ) {
                origin[1] = 0; // No need to add unit because head is drawn from topLeft
            }
        }

        /**
         * Update Past Coordinates
         *
         * Manages pastCoords array
         */
        function updatePastCoords() {
            /**
             * Push an array containing x & y coordinates to the pastCoords
             * array.
             *
             *      pastCoords.push( [x, y] )
             */
            pastCoords.push( [ coords[0], coords[1] ] );

            /**
             * We need to trim the pastCoords array when it gets too long.
             *
             * If the length of our pastCoords array is more than the length of
             * our snake's body...
             */
            if( pastCoords.length > segments.length ) {

                /**
                 * Remove 1 element of our array from index 0.
                 *
                 *      pastCoords[0] == 'foo'
                 *      pastCoords[1] == 'bar'
                 *      pastCoords[2] == 'baz'
                 *
                 *      becomes:
                 *
                 *      pastCoords[0] == 'bar'
                 *      pastCoords[1] == 'baz'
                 */
                pastCoords.splice( 0, 1 );
            }
        }

        /**
         * Draw Snake
         *
         * Draws rectangle(s) onto the canvas when given x and y coords in an
         * array.
         *
         * @param array[x, y]
         */
        function drawSnake( origin ) {
            // The head of our snake
            draw.fillStyle = "rgb( 20, 151, 245)";
            draw.fillRect( origin[0], origin[1], unit, unit );

            // body segments
            for( i = 0; i < segments.length; i++ ) {
                if( i < 5 ) {
                    /**
                     * We're adjusting our fill style based on the loops index.
                     *
                     * The fourth value in rgba() stands for alpha, which is how
                     * transparent the fill is. The closer the alpha value is to
                     * 1, the less transparent it is.
                     */
                    draw.fillStyle = "rgba( 20, 151, 245, 0." + ( i + 3 ) + " )";
                } else {
                    draw.fillStyle = "rgba( 20, 151, 245, 0.7 )";
                }
                draw.fillRect( pastCoords[i][0], pastCoords[i][1], unit, unit );
            }
        }

        /**
         * Hit Check
         *
         * This function checks whether two sets of coordinates (and their
         * widths|heights) are overlapping each other.
         *
         * Each parameter is an array consisting of:
         *
         *      [0] the x|y coordinate of the shape
         *      [1] the x|y coordinate plus the width|height of the shape.
         *
         * How it's used:
         *
         *      var snakeHead = [ [ coords[0], coords[0] + unit ], [ coords[1], coords[1] + unit ] ];
         *      var fruit = [ [ fruitCoords[0], fruitCoords[0] + unit ], [ fruitCoords[1], fruitCoords[1] + unit ] ];
         *
         *      var hitX = hitCheck( snakeHead[0], fruit[0] );
         *      var hitY = hitCheck( snakeHead[1], fruit[1] );
         *
         *      var hit = hitX && hitY;
         *
         *      if( hit ) {
         *          Do stuff
         *      }
         *
         *
         * @param  array[ x|y, x+w|y+h ]
         * @param  array[ x|y, x+w|y+h ]
         * @return bool
         */
        function hitCheck( coords, fruitCoords ) {

            if( coords[0] < fruitCoords[0] ) {
                var a = coords;
            } else {
                var a = fruitCoords;
            }

            if( coords[0] < fruitCoords[0] ) {
                var b = fruitCoords;
            } else {
                var b = coords;
            }

            /**
             * If the smallest given x|y+w coordinate is more than the biggest
             * given x|y coordinate
             *
             *      OR
             *
             * The smallest given x|y coordinate is equal to the largest given
             * x|y coordinate.
             *
             * They're overlapping
             */
            if( a[1] > b[0] || a[0] === b[0] ) {
                return true;
            } else {
                return false;
            }

        }

        /**
         * Fruit Handler
         *
         * Function checks whether snake has eaten fruit and calls generation of
         * fruit when it there is no fruit on page.
         */
        function fruitHandler() {
            // If fruitExists is false...
            if( ! fruitExists ) {
                // Just like spawning the snake head
                fruitCoords = generateRandomCoords();
                fruitExists = true;
            }

            // At this point we always have a fruit
            draw.fillStyle = "green"; // It's an apple!
            draw.fillRect( fruitCoords[0], fruitCoords[1], unit, unit );

            // Check whether the snake has eaten the fruit!
            var snakeHead = [ [ coords[0], coords[0] + unit ], [ coords[1], coords[1] + unit ] ];
            var fruit = [ [ fruitCoords[0], fruitCoords[0] + unit ], [ fruitCoords[1], fruitCoords[1] + unit ] ];

            var hitX = hitCheck( snakeHead[0], fruit[0] );
            var hitY = hitCheck( snakeHead[1], fruit[1] );

            var hit = hitX && hitY;

            if( hit ) {
                // Clear the fruit from the canvas
                draw.clearRect( fruitCoords[0], fruitCoords[1], unit, unit );
                fruitExists = false;

                // Draw in the snake's head (we just cleared that section of the canvas)
                draw.fillStyle = "rgb( unit, 151, 245)";
                draw.fillRect( fruitCoords[0], fruitCoords[1], unit, unit );

                // Grow the snake
                segments.push( toString( segments.length + 1 ) );

                // Speed it up
                if( tickSpeed > 40 ) {
                    tickSpeed -= 10;
                }

                updateScore();
            }
        }

        /**
         * Update Score
         *
         * This updates the player's score each time the snake eat's something.
         *
         */
        function updateScore() {
            // Increment the score and update our HTML
            score += scoreIncrement;
            $( '.score' ).html( score );

            // If our score is the highest yet, update our high score
            if( score > highScore ) {
                highScore = score;
                $( '.high-score' ).html( highScore );

        }
		}
		


        /**
         * Tail Bite Handler
         *
         * Checks to see whether snake has bitten itself.
         */
        function tailBiteCheck() {
            var snakeHead = [ [ coords[0], coords[0] + unit ], [ coords[1], coords[1] + unit ] ];

            // Loop over all of the segments in the snake's tail
            for( i = 0; i < segments.length - 1; i++ ) {
                var tailSegment = [ [ pastCoords[i][0], pastCoords[i][0] + unit ], [ pastCoords[i][1], pastCoords[i][1] + unit ] ];

                var hitX = hitCheck( snakeHead[0], tailSegment[0] );
                var hitY = hitCheck( snakeHead[1], tailSegment[1] );
                var hit = hitX && hitY;

                if( hit ) {
                    reset();
                }
            }
        }

        /**
         * Reset
         *
         * Resets game
         */
        function reset() {

            alert( "Game Over" );

            // Clean our arrays and reset the tickSpeed
            segments.splice( 1, segments.length - 1 );
            pastCoords.splice( 1, pastCoords.length - 1 );
            tickSpeed = 100;

            // Reset score
            score = 0;
            $( '.score' ).html( score );

            // Generate new coordinates for the snake
            var newCoords = generateRandomCoords();
            coords = newCoords;
        }

        function tick() {

            // Clear the entire canvas
            draw.clearRect( 0, 0, canvas.width, canvas.height );

            /**
             * We only want the player to be able to issue one direction command
             * per tick.
             */
            tock = true;

            // Listen for keydown event
            $( document ).keydown( function( e ) {
                changeDirection( e );
            });

            updateCoords( coords );
            drawSnake( coords );
            fruitHandler();
            tailBiteCheck();

            /**
             * This timeout will call its parent function, tick(), ever 100ms, thus
             * looping on itself
             */
            setTimeout( function() { tick() }, tickSpeed );
        }

        return {

            /**
             * Init
             *
             * Accessed via snake.init(), this function is a handle for the
             * snake namespace.
             */
            init : function() {

                /**
                 * Here we refer to the tick() fuction within the snake namespace.
                 * We only want to call init() once, so tick() will have to loop on
                 * itself
                 */
                tick();
            }

        };

    }();

    snake.init();

});
