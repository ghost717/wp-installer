=== ACF OpenStreetMap Field ===
Contributors: podpirate
Donate link: https://donate.openstreetmap.org/
Tags: map acf openstreetmap leaflet
Requires at least: 4.8
Requires PHP: 5.6
Tested up to: 5.2.2
Stable tag: 1.1.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A configurable OpenStreetMap Field for ACF.

== Description ==

Hazzle free OpenStreetMap with [ACF](https://www.advancedcustomfields.com/).

## Usage

#### In the Fieldgroup editor:

**Return Format:**

 - *Raw data* will return an array holding the field configuration.

 - *Leaflet JS* will return a fully functional leaflet map. Just include `<?php the_field('my_field_name'); ?>` in your Theme.
You can choose from a long list of map styles and it supports multiple markers.

 - *iFrame (OpenStreetMap.org)* Will return an iFrame HTML. Only four map styles are supported
– the ones you find on [OpenStreetMap](https://www.openstreetmap.org/) – and not more than one marker.

**Map Appearance:** Pan and zoom on the map and select from the Map layers to set the initial map position and style in the editor.

**Map Position:** If you're more like a numbers person here you can enter numeric values for the map position.

**Allow layer selection:** Allow the editors to select which map layers to show up in the frontend.

**Height:** Map height in the frontend and editor.

**Max. number of Markers**
 - *No value:* infinite markers
 - *0:* No markers
 - *Any other value:* Maximum number of markers. If the return format is *iFrame* there can ony be one marker.

## Development

Please head over to the source code [on Github](https://github.com/mcguffin/acf-openstreetmap-field).
## Credits
- Eliott Condon's [ACF](https://www.advancedcustomfields.com/) for sure!
- The [OpenStreetMap](https://www.openstreetmap.org/) project
- [The Leaflet Project](https://leafletjs.com/)
- The maintainers and [contributors](https://github.com/leaflet-extras/leaflet-providers/graphs/contributors) of [Leaflet providers](https://github.com/leaflet-extras/leaflet-providers)
- The [very same](https://github.com/perliedman/leaflet-control-geocoder/graphs/contributors) for [Leaflet Control Geocode](https://github.com/perliedman/leaflet-control-geocoder)
- Numerous individuals and organizations who provide wonderful Map related services free of charge. (You are credited in the map, I hope)

== Installation ==

Follow the standard [WordPress plugin installation procedere](http://codex.wordpress.org/Managing_Plugins).


== Frequently asked questions ==

= I found a bug. Where should I post it? =

Please use the issues section in the [GitHub-Repository](https://github.com/mcguffin/acf-openstreetmap-field/issues).

I will most likely not maintain the forum support forum on wordpress.org. Anyway, other users might have an answer for you, so it's worth a shot.

= I'd like to suggest a feature. Where should I post it? =

Please post an issue in the [GitHub-Repository](https://github.com/mcguffin/acf-openstreetmap-field/issues)

= I am a map tile provider. Please don't include our service in your plugin. =

The provisers list is taken from [Leaflet providers](https://github.com/leaflet-extras/leaflet-providers), so requests for an unlisting should go there first.

If you want your service to remain in Leaflet Providers, you can Post an issue in the plugin's [GitHub-Repository](https://github.com/mcguffin/acf-openstreetmap-field/issues).
Please provide me some way for me to verify, that you are acting on behalf of the Tile service provider your want to exclude.
(E.g. the providers website has a link to your github account.)

= Im getting these "Insecure Content" Warnings =

Some providers – like OpenPtMap or MtbMap – do not support https. If these warning bother you, choose a different one.

= Why isn't the map loading? =

There is very likely an issue with the map tiles provider you've choosen. Some of them might be down or have suspended their service. Choose another one.

= I need to do some fancy JS magic with my map. =

Check out the [GitHub wiki](https://github.com/mcguffin/acf-openstreetmap-field/wiki). Some of the js events might come in handy for you.
For Documentation of the map object, please refer to [LeafletJS](https://leafletjs.com).

= Will you anwser support requests via emails? =

No.


== Screenshots ==

1. ACF Field Group Editor
2. Editing the Field Value
3. Display in the Frontend


== Changelog ==

= 1.1.0 =
 - UI: Usability Improvements
 - Tested: Verfied Compatibility with Widgets, Block-Editor, Frontend Form
 - Stored data pretty much like google map field
 - Code: Refactored JS

= 1.0.1 =
Convert Values from ACF Googlemaps-Field

= 1.0.0 =
Initial Release
