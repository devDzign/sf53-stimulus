const $ = require('jquery');
global.$ = global.jQuery = $;

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

// You can specify which plugins you need
import { Tooltip, Toast, Popover, Modal, ScrollSpy, Alert,Tab, Button, Carousel, Collapse, Dropdown, Offcanvas } from 'bootstrap';
require('bootstrap');