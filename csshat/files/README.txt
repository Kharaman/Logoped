Welcome CSS Hat, the best and fastest way to move layer styles to CSS!

Installation:
	1. Copy "csshat" folder into photoshop Plug-ins/Panels folder.
		- On Mac it is usually in /Applications/Adobe Photoshop (version)/Plug-ins/Panels
		- On Windows it should be in C:/Program Files/Adobe/Adobe Photoshop (version)/Plug-ins/Panels
	2. You will find CSS Hat Panel in Photoshop under Window > Extensions > CSS Hat
	3. Enjoy!
	4. Please report bugs to support@csshat.com

CSS Hat can give you CSS for:
	* layer color and gradient fill
	* layer effects: 
		- drop shadow
		- inner shadow
		- inner glow
		- outer glow
		- gradient overlay - normal and reflected, linear and radial gradient
		- solid color overlay
		- stroke
	* font properties:
		- color
		- text-shadow
		- font-family
		- font-size
		- font-weight
		- font-style
		- text-decoration
	* opacity and layer fill
	* border-radius - either autodetected from shape (if you use Photoshop's round rectangle tool), or from layer name (just add for example '2px' anywhere in the layer name)
	* gradients can have linear, reflected or radial types so far
	* vendor prefixes for current browsers, including SVG of gradients for IE9+

CSS Hat outputs code for:
	* CSS
	* LESS with LESS Hat (http://lesshat.com) library
	* SASS/SCSS with Compass (http://compass-style.org/) library
	* Stylus with nib (https://github.com/visionmedia/nib) library

Known bugs:
	* blending modes are ignored so far (as there is no way to express them in CSS), warning is shown in this case
	* colors are a bit off if there is a color profile

In future there will be:
	* more features
	* less bugs :)

Changelog:
1.1.0:
	* FEATURE: LESS with LESS Hat mixin library — https://github.com/CSSHat/LESSHat
	* FEATURE: SASS/SCSS with Compass framework http://compass-style.org/
	* FEATURE: STYLUS with nib library http://visionmedia.github.com/nib/
	* FEATURE: Font properties
	* FEATURE: All stroke types are now expressed as border, to preserve backwards compatibility
	* FEATURE: Syntax highlighting
	* FIX: Non-prefixed CSS3 gradients have correct angle. We apologize for that, but you'll have to regenerate or fix previously created code if you want gradients to look same in IE10 and latest Chrome :(.
	* FIX: Many smaller tweaks covering edge cases
	* FIX: Stability fixes

1.0.4:
	* FEATURE: there is no more need to manually refresh CSS in Photoshop CS4 - CSS Hat tracks layer changes just like in CS5+
	* UI: nicer update checker and tooltips
	* CSS: position and scale works for both linear and gradient gradients, in both CSS3 and SVG

1.0.3:
	* FIX: crashes for specific gradients
	* FIX: border-radius with nonzero border widths is now correct
	
1.0.2:
	* UI: Icon corresponds with the rest of PS interface
	* FIX: fixed bugs in gradient flattening code, font color
	* CSS: comments correspond with PS layer effect names
	
1.0.1:
	* FEATURE: layer name can now be any CSS selector - just name your layer my-button:hover[content~="awesome"] and it will export correctly
	* FIX: in some cases stroke width wasn't accurate
	* improved error messages

1.0.0:
	* FEATURE: Works on Photoshop CS4! The CS4 is different in the way it requires manual refresh of Hat as there aren well usable APIs for observing changes.
	* FIX: lot of small bugfixes
	* UI: new icons for copy (CS5) and copy + refresh (CS4) buttons

0.9.6:
	* UI: notification when using layer styles that are not portable to CSS
	* FIX: removed initial numbers from CSS rule name
	
0.9.5:
	* UI: icons on toggle buttons, descriptive tooltips
	* UI: smarter error messages
	* UI: new skin to go with CS6 suite, that looks well in previous version as well
	* FEATURE: built in update checker
	* FEATURE: option to generate whole CSS rule, named after layer
	* CSS: radial gradients in SVG
	* CSS: border-radius detection even for circles or rectangles with completely rounded sides
	* FIX: fixed error layer groups were selected

0.9.2:
	* UI: warnings for features that {css:hat} cannot transfer to css - blending modes, gradient scale for Firefox
	* FEATURE: reading border radius from vector layer mask, if possible, otherwise from layer name
	* FEATURE: reading of width and height from vector mask if possible, otherwise from layer bounds
	* CSS: vendor-specific values are now tailored to browser capabilities
	* CSS: gradients - position and scale is now rendered as well
	* CSS: export of all gradients into one svg for IE9+
	* FIX: subpixel and 1 pixel shadows are changed so that browsers render them same as Photoshop
	* FIX: border is rendered outi

0.9.0:
	* first private test version
\
