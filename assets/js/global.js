import 'babel-polyfill';
import 'classlist-polyfill';

import Nav from './components/nav';
import Intro from './components/intro';

const header = document.querySelector('.js-header');
const nav = document.querySelector('.js-nav');
new Nav(header, nav);

const introBlock = document.querySelector('.js-intro');
new Intro(introBlock);