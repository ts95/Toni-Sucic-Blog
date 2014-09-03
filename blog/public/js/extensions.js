////////////////////////////////////////////////////////////////////////////
// jQuery extensions
////////////////////////////////////////////////////////////////////////////

/**
 * Generates a random integer between min (inclusive) and max (inclusive).
 */
$.randInt = function(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min;
};
