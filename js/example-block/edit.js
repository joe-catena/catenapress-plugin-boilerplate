import { Component } from "@wordpress/element";
import { withSelect } from "@wordpress/data";
import { __ } from "@wordpress/i18n";
import { decodeEntities } from "@wordpress/html-entities";
import { PanelBody, TextControl, SelectControl } from "@wordpress/components";
import { InspectorControls } from "@wordpress/editor";