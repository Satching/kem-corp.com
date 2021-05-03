<?php
/**
 * Template style critical path 
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_critical_path() {


/**
 * [Object] loading
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

	$loading = '
	#js-loading-overlay {
		position: fixed;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background-color: #fff;
		z-index: 99999;
	}
	#js-loading-animation,
	#js-loading-animation img {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		z-index: 999;
	}
	.loading-icon {
		border-radius: 50%;
		width: 56px;
		height: 56px;
		border-top: 4px solid rgba(248, 248, 248, 0.9);
		border-right: 4px solid rgba(248, 248, 248, 0.9);
		border-bottom: 4px solid rgba(248, 248, 248, 0.9);
		transform: translateZ(0);
		animation: circle 1.4s infinite linear;
	}
	.loading-text {
		position: absolute;
		top: 50%;
		right: 0;
		left: 0;
		transform: translateY(-50%);
		text-align: center;
		width: 100%;
		height: 100px;
		line-height: 100px;
		font-size: 1.33333rem;
	}
	.loading-text span {
		padding: 8px;
		animation: blur-text 0.6s infinite linear alternate;
	}
	.loading-text span:nth-child(1) {
		animation-delay: 0s;
	}
	.sound-text span:nth-child(2) {
		animation-delay: 0.1s;
	}
	.loading-text span:nth-child(3) {
		animation-delay: 0.2s;
	}
	.loading-text span:nth-child(4) {
		animation-delay: 0.3s;
	}
	.loading-text span:nth-child(5) {
		animation-delay: 0.4s;
	}
	.loading-text span:nth-child(6) {
		animation-delay: 0.5s;
	}
	.loading-text span:nth-child(7) {
		animation-delay: 0.6s;
	}
	';

	$foundation_reset = '
	html, body, h1, h2, h3, h4, ul, ol, dl, li, dt, dd, p, div, span, img, a, table, tr, th, td {
		margin: 0;
		padding: 0;
		border: 0;
		font-weight: normal;
		font-size: 100%;
		vertical-align:baseline;
		box-sizing: border-box;
	}
	article, header, footer, aside, figure, figcaption, nav, section { 
		display:block;
	}
	body {
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}
	ol, ul {
		list-style: none;
		list-style-type: none;
	}
	figure {
		margin: 0;
	}
	img {
		border-style: none;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}
	a, a:hover, a:visited, a:active, a:focus {
		text-decoration: none;
	}
	a:active, a:hover {
		outline-width: 0;
	}
	*,
	*::before,
	*::after {
		box-sizing: border-box;
	}
	';

	$layout_content = '
	#contents {
		flex: 1 0 auto;
	}
	.l-content,
	.l-content__sm,
	.l-content[data-content_width="narrow"]
	.l-content__fluid {
		position: relative;
		margin: auto;
		width: calc(100% - 32px);
	}
	.l-header .l-content,
	.l-header .l-content__fluid {
		width: 100%;
	}
	.l-content__inner {
		margin-top: 32px;
		margin-bottom: 48px;
	}
	@media screen and ( min-width: 768px ) {
	.l-content__inner {
		margin-top: 48px;
		margin-bottom: 64px;
	}
	}
	/* フロントページ用 */
	.home .l-content__inner {
		margin-top: 64px;
	}
	.l-content__main .l-content,
	.l-content__main .l-content[data-content_width="narrow"] {
		width: 100%;
	}
	.l-content__main .c-section-widget__inner {
		padding-top: 0;
		padding-bottom: 48px;
		padding-right: 0;
		padding-left: 0;
	}
	/* タブレット */
	@media screen and ( min-width: 768px ) {
	.l-content,
	.l-content__sm,
	.l-content[data-content-width="narrow"],
	.l-header .l-content {
		width: calc(768px - 32px);
	}
	}
	/* PC タブレット */
	@media screen and ( min-width: 960px ) {
	.l-content,
	.l-header .l-content {
		width: calc(960px - 32px);
	}
	}
	/* PC */
	@media screen and ( min-width: 1200px ) {
	.l-content,
	.l-header .l-content {
		width: calc(1212px - 32px);
	}
	}
	';

	$foundation_html_element = '
	html {
		font-size: 16px;
	}
	body {
		word-wrap : break-word;
		overflow-wrap : break-word;
		line-height: 1.6;
		background-color: #fff;
		font-size: 1rem;
		font-weight: normal;
		color: #333;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		overflow-y: scroll;
		overflow-x: hidden;
	}
	h1 {
		font-weight: bold;
		font-size: 1.6rem;
		clear: both;
	}
	h2 {
		font-weight: bold;
		font-size: 1.33333rem;
		clear: both;
	}
	h3,
	h4 {
		font-weight: bold;
		font-size: 1.14286rem;
		clear: both;
	}
	h5,
	h6 {
		font-weight: normal;
		font-size: 1rem;
		clear: both;
	}
	b, strong, .strong {
		font-weight: bold;
	}
	dfn,
	cite,
	em {
		font-style: italic;
	}
	hr {
		height: 2px;
		border: 0;
		background-color: #e5e7e8;
	}
	img {
		height: auto;
		max-width: 100%;
		vertical-align: middle;
	}
	blockquote {
		position: relative;
		display: block;
		padding-top: 24px;
		padding-bottom: 24px;
		padding-right: 32px;
		padding-left: 32px;
		line-height: 1.8;
		font-size: 1rem;
	}
	blockquote cite {
		display: block;
		margin-top: 16px;
		font-size: 0.88889rem;
		color: #484848;
	}
	abbr[title] {
		text-decoration: underline;
	}
	mark,
	ins {
		text-decoration: none;
	}
	small,
	.small {
		font-size: 0.72727rem;
	}
	code {
		font-family: monospace, serif;
	}
	table thead th {
		padding: 8px 12px;
		background-color:#fafafa;
		font-size: 1rem;
		font-weight: bold;
	}
	table th {
		padding: 8px 12px;
		background-color: #fafafa;
		border: 1px solid #b8bcc0;
		vertical-align: middle;
		font-size: 1rem;
		font-weight: bold;
	}
	table td {
		padding: 8px 12px;
		border: 1px solid #b8bcc0;
		font-size: 1rem;
		vertical-align: middle;
	}
	label {
		font-size: 1rem;
		cursor: pointer;
	}
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	input[type="search"],
	input[type="number"],
	input[type="tel"],
	input[type="date"],
	input[type="month"],
	input[type="week"],
	input[type="time"],
	input[type="datetime"],
	input[type="datetime-local"],
	textarea {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		padding-top: 6px;
		padding-bottom: 6px;
		padding-right: 12px;
		padding-left: 12px;
		width: 100%;
		border-radius: 3px;
		background-color: #fff;
		border: 1px solid #b8bcc0;
		transition: all 0.2s ease-in;
		letter-spacing: 0.05em;
		font-size: 1rem;
	}
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	select:focus {
		outline: none;
	}
	input[type="color"] {
		-webkit-appearance: square-button;
		-moz-appearance: square-button;
		appearance: square-button;
		border-radius: 3px;
		border: 1px solid #b8bcc0;
	}
	input[type="range"] {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		background-color: #b8bcc0;
		height: 2px;
	}
	input[type="radio"],
	input[type="checkbox"] {
		margin-right: 8px;
	}
	input[type="file"] {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		margin: 8px 0;
		width: 100%;
	}
	button,
	input[type="button"],
	input[type="submit"] {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		padding-top: 7px;
		padding-bottom: 7px;
		padding-right: 12px;
		padding-left: 12px;
		border-radius: 3px;
		vertical-align: bottom;
		line-height: 1;
		text-align: center;
		letter-spacing: 0.05em;
		font-size: 0.88889rem;
		color: #fff;
		transition: all ease 0.3s;
		cursor: pointer;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="submit"]:hover {
		color: #fff;
	}
	input::placeholder,
	textarea::placeholde {
		color: #b8bcc0;
	}
	input::-webkit-input-placeholder,
	textarea::-webkit-input-placeholder {
		color: #b8bcc0;
	}
	input::-moz-placeholder,
	textarea::-moz-placeholder,{
		color:#b8bcc0;
	}
	input::-ms-input-placeholder,
	textarea::-ms-input-placeholder, {
		color: #b8bcc0;
	}
	textarea:focus::placeholder,
	input:focus::placeholder {
		color:transparent
		color: #72777c;
	}
	input:focus::-webkit-input-placeholder,
	textarea:focus::-webkit-input-placeholder {
		color:transparent
	}
	input:focus::-moz-placeholder,
	textarea:focus::-moz-placeholder,{
		color:transparent
	}
	input:focus::-ms-input-placeholder,
	textarea:focus::-ms-input-placeholder, {
		color:transparent
	}
	select {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		padding-right: 8px;
		padding-left: 8px;
		height: 32px;
		background-color: #fff;
		border: 1px solid #b8bcc0;
		border-radius: 3px;
		letter-spacing: 0.05em;
		font-size: 1rem;
	}
	select::-ms-expand {
		display: none;
	}
	input[type="search"],
	textarea {
		width: 100%;
		font-size: 1rem;
	}
	a:hover {
		transition: all 0.3s ease;
	}
	';

	$layout_grid = '
	.wrapper-col {
		width: 100%;
	}
	.wrapper-col.has-sp-card-2 {
		width: calc(100% + 12px);
	}
	[class^="col-"],
	[class*="col-"] {
		width: 100%;
	}
	@media screen and ( min-width: 768px ) {
	.wrapper-col,
	.wrapper-col.has-sp-card-2 {
		width: calc(100% + 24px);
	}
	[class^="col-"],
	[class*="col-"]  {
		margin-right: 24px;
		width: calc(100% - 24px);
	}
	.col-1 {
		width: calc(8.333% - 24px);
	}
	.col-2 {
		width: calc(16.667% - 24px);
	}
	.col-3 {
		width: calc(25% - 24px);
	}
	.col-4 {
		width: calc(33.333% - 24px);
	}
	.col-5 {
		width: calc(41.667% - 24px);
	}
	.col-6 {
		width: calc(50% - 24px);
	}
	.col-7 {
		width: calc(58.333% - 24px);
	}
	.col-8 {
		width: calc(66.667% - 24px);
	}
	.col-9 {
		width: calc(75% - 24px);
	}	
	.col-10 {
		width: calc(83.333% - 24px);
	}
	.col-11 {
		width: calc(91.667% - 24px);
	}
	.col-12 {
		width: calc(100% - 24px)
	}
	}
	';

	$utility_row = '
	.u-row {
		display: flex;
	}
	.u-row-wrap {
		flex-wrap: wrap;
	}
	.u-row-nowrap {
		flex-wrap: nowrap;
	}
	.u-row-item-top {
		align-items: flex-start;
	}
	.u-row-item-center {
		align-items: center;
	}
	.u-row-item-bottom {
		align-items: flex-end;
	}
	.u-row-cont-around {
		justify-content: space-around;
	}
	.u-row-cont-between {
		justify-content: space-between;
	}
	.u-row-cont-start {
		justify-content: flex-start;
	}
	.u-row-cont-center {
		justify-content: center;
	}
	.u-row-cont-end {
		justify-content: flex-end;
	}
	.u-row-dir {
		flex-direction: row;
	}
	.u-row-dir-reverse {
		flex-direction: row-reverse;
	}
	.u-row-dir-column {
		flex-direction: column;
	}
	.u-row-flex-grow-1 {
		flex-grow: 1;
	}
	.u-row-flex-grow-2 {
		flex-grow: 1;
	}
	.u-row-flex-grow-3 {
		flex-grow: 1;
	}
	';

	$keyframes = '
	@keyframes fade {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}
	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: translateY(16px);
		}
		to {
			opacity: 1;
		}
	}
	@keyframes fadeSlideIn {
		from {
			opacity: 0;
			transform: translateX(-32px);
		}
		to {
			opacity: 1;
		}
	}
	@keyframes fadeOut {
		from {
			opacity: 1;
		}
		to {
			opacity: 0;
			transform: translateY(16px);
		}
	}
	@keyframes slideDown {
		from {
			transform: translateY(-100%);
			opacity: 0;
		}
		to {
			transform: translateY(0);
			opacity: 1;
		}
	}
	@keyframes slideUp {
		from {
			transform: translateY(0);
		}
		to {
			transform: translateY(-100%);
		}
	}
	@keyframes slideUpText {
		from {
			transform:translateY(-48px);
			opacity: 0;
		}
		to {
			transform:translateY(-50%);
			opacity: 1;
		}
	}
	@keyframes circle {
		from {
			transform: rotate(0deg);
		}
		to {
			transform: rotate(360deg);
		}
	}
	@keyframes spinY {
		from {
			transform: rotateY( 0deg );
		}
		to {
			transform: rotateY( 360deg );
		}
	}
	@keyframes sound-visualize {
		0% {
			transform: scaleY(0);
		}
		50% {
			transform: scaleY(1);
		}
		100% {
			transform: scaleY(0.2);
		}
	}
	@keyframes blur-text {
		0% {
			filter: blur(0);
			opacity: 1;
		}
		100% {
			filter: blur(2px);
			opacity: 0.8;
		}
	}
	@keyframes expansion-image {
		0% {
			transform: scale(1);
			}
		100% {
			transform: scale(1.15);
		}
	}
	@keyframes reduced-image {
		0% {
			transform: scale(1.15);
			}
		100% {
			transform: scale(1);
		}
	}
	@keyframes slide-image {
		from {
			transform: translateX(0);
		}
		to {
			transform: translateX(48px);
		}
	}
	@keyframes lustre {
		100% {
			left: 60%;
		}
	}
	@keyframes ripple-drop {
		100% {
			transform: scale(2);
			opacity: 0;
		}
	}
	@keyframes ctaIconSlideInRight {
		from {
		opacity: 0;
		transform: translateX(calc(100% + 360px));
		}
		
		to {
		opacity: 1;
		transform: translateX(0);
		}
	}
	@media screen and ( min-width: 768px ) {
		@keyframes ctaIconSlideInRight {
			from {
			opacity: 0;
			transform: translateX(360px);
			}
			
			to {
			opacity: 1;
			transform: translateX(0);
			}
		}
	}
	@keyframes headerLanguage {
		from {
			opacity: 0;
			transform: translateY(16px);
		}
		to {
			opacity: 1;
			transform: translateY(0);
		}
	}
	';

	$font_face = '
	@font-face {
		font-family: "icomoon";
		src: url("'. T_DIRE_URI .'/assets/fonts/icomoon/fonts/icomoon.eot?qg435a");
		src: url("'. T_DIRE_URI .'/assets/fonts/icomoon/fonts/icomoon.eot?qg435a#iefix") format("embedded-opentype"),
			url("'. T_DIRE_URI .'/assets/fonts/icomoon/fonts/icomoon.woff?qg435a") format("woff"),
			url("'. T_DIRE_URI .'/assets/fonts/icomoon/fonts/icomoon.ttf?qg435a") format("truetype"),
			url("'. T_DIRE_URI .'/assets/fonts/icomoon/fonts/icomoon.svg?qg435a#icomoon") format("svg");
		font-weight: normal;
		font-style: normal;
		font-display: swap;
	}
	';

	$layout_header = '
	.l-header {
		position: relative;
		z-index: 200;
	}
	.l-header__inner {
		display: flex;
		align-items: center;
		justify-content: space-between;
		height: 60px;
		overflow: hidden;
	}
	.home:not(.paged).is-overlay .l-header {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		z-index: 200;
	}
	.home:not(.paged).is-overlay .l-header-default,
	.home:not(.paged).is-overlay .l-header-center,
	.home:not(.paged).is-overlay .l-header-row {
		background-color: inherit;
		box-shadow: inherit;
	}
	@media screen and ( min-width: 768px ) {
	.l-header__inner {
		height: 86px;
		overflow: visible;
	}
	.l-header-default .l-header__inner {
		justify-content: flex-start;
	}
	.l-header-center .l-header__inner {
		justify-content: center;
	}
	.site-description {
		font-size: 0.8rem;
	}
	.l-header-default .site-description,
	.l-header-row .site-description {
		width: 100%;
	}
	}
	';

	$site_logo = '
	.header-site-branding {
		width: 100%;
		height: 60px;
	}
	.header-site-branding.is-left {
		justify-content: flex-start;
		margin-left: 8px;
	}
	.header-site-branding.is-center {
		justify-content: center;
		text-align: center;
	}
	.header-site-branding.have-drawer-menu.is-left{
		margin-left: 45px;
	}
	@media screen and ( min-width: 768px ) {
	.header-site-branding.is-center {
		justify-content: flex-start;
		text-align: left;
	}
	.header-site-branding.have-drawer-menu.is-left {
		margin-left: 0;
	}
	}	
	.icon-logo {
		margin-right: 6px;
	}
	.icon-logo-baseline {
		margin-right: 4px;
		vertical-align: baseline;
	}
	@media screen and ( min-width: 768px ) {
	.icon-logo-baseline {
		margin-right: 6px;
	}
	}
	.site-logo {
		display: table-cell;
		vertical-align: middle;
		font-size: inherit;
	}
	.site-title {
		display: table-cell;
		vertical-align: middle;
		line-height: 1;
		font-size: 1.6rem;
	}
	.site-description {
		display: block;
		margin: auto;
		font-size: 0.72727rem;
		letter-spacing: 0.05em;
		color: #828990;
	}
	.site-description.on-logo {
		line-height: 1.5;
	}
	.site-description.under-logo {
		margin-top: 6px;
	}
	.site-logo img {
		width: auto;
	}
	.header-site-branding .site-title {
		letter-spacing: 0.05em;
	}
	.header-site-branding .site-title a {
		color: #333;
	}
	@media screen and ( min-width: 768px ) {
	.header-site-branding {
		width: auto;
	}
	.header-site-branding.have-drawer-menu.is-center {
		margin-left: 0;
	}
	.l-header-row .header-site-branding.have-drawer-menu {
		margin-left: 56px;
	}
	.l-header-default .header-site-branding.have-drawer-menu {
		margin-left: 16px;
	}
	.l-header-default .l-content__fluid .header-site-branding:not(.have-drawer-menu),
	.l-header-row .l-content__fluid .header-site-branding:not(.have-drawer-menu) {
		margin-left: 12px;
	}
	.l-header-center .header-site-branding {
		text-align: center;
	}
	}
	';

	$hamburger_menu = '
	.hamburger-menu {
		position: absolute;
		left: 8px;
		padding: 0;
		border: none;
		outline: none;
		background-color: inherit;
		line-height: 1.2;
		text-align: center;
		cursor: pointer;
	}
	@media screen and ( min-width: 768px ) {
	.hamburger-menu {
		left: 0;
	}
	.l-content__fluid .hamburger-menu {
		width: 48px;
	}
	.l-header-default .hamburger-menu {
		position: relative;
		top: 0;
		transform: translateY(0%);
	}
	}
	.hamburger-menu-label {
		display: none;
		line-height: 1;
		text-align: center;
		font-size: 0.66667rem;
	}
	@media screen and (min-width: 768px) {
	.hamburger-menu-label {
		display: block;
	}
	}
	.hamburger-menu-trigger,
	.hamburger-menu-trigger span {
		display: inline-block;
		box-sizing: border-box;
	}
	.hamburger-menu-trigger {
		position: relative;
		width: 26px;
		height: 18px;
	}
	.has-menu .hamburger-menu-trigger {
		top: -4px;
	}
	.hamburger-menu-trigger span {
		position: absolute;
		left: 0;
		width: 100%;
		height: 1px;
		border-radius: 3px;
	}
	.hamburger-menu-trigger span:nth-of-type(1) {
		top: 0;
		transition: all 0.2s ease;
	}
	.hamburger-menu-trigger span:nth-of-type(2) {
		top: 8px;
	}
	.hamburger-menu-trigger span:nth-of-type(3) {
		bottom: 0;
		transition: all 0.2s ease;
	}
	.hamburger-menu:hover {
		border: none;
		background-color: inherit;
	}
	.hamburger-menu:hover .hamburger-menu-trigger span:nth-of-type(1) {
		transform: translateY(2px);
	}
	.hamburger-menu:hover .hamburger-menu-trigger span:nth-of-type(3) {
		transform: translateY(-2px);
	}
	/* Floating hamburger menu */
	.hamburger-menu-floating {
		position: fixed;
		visibility: hidden;
		right: 16px;
		bottom: 72px;
		height: 60px;
		width: 60px;
		padding: 0;
		margin-bottom: calc(env(safe-area-inset-bottom) * 0.5);
		text-align: center;
		border-radius: 50%;
		border: none;
		outline: none;
		box-shadow: 0 2px 4px -1px rgba(0,0,0,0.2), 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12);
		transform: translateX(calc(100% + 16px));
		transition: 0.2s cubic-bezier(0,.6,.99,1);
		cursor: pointer;
		z-index: 998;
	}
	.hamburger-menu-floating.is-show {
		visibility: visible;
		transform: translateX(0);
	}
	.hamburger-menu-floating:hover {
		border: none;
	}
	.hamburger-menu-floating:not(.has-menu) .hamburger-menu-trigger {
		margin-top: 4px;
	}
	.hamburger-menu-floating .hamburger-menu-label {
		position: absolute;
		right: 0;
		bottom: 9px;
		left: 0;
	}
	.hamburger-menu-floating span {
		transition: 0.3s cubic-bezier(0,.6,.99,1);
	}
	.hamburger-menu-floating.is-active .hamburger-menu-trigger span:nth-of-type(1) {
		transform: translate(0, 9px) rotate(-45deg);
	}
	.hamburger-menu-floating.is-active .hamburger-menu-trigger span:nth-of-type(2) {
		opacity: 0;
	}
	.hamburger-menu-floating.is-active .hamburger-menu-trigger span:nth-of-type(3) {
		transform: translate(0, -8px) rotate(45deg);
	}
	/* Drawer menu */
	.drawer-menu {
		visibility: hidden;
		position: fixed;
	}
	';

	$header_cta = '
	.header-cta {
		position: absolute;
		right: 0
	}
	.header-cta .is-active .switch-off,
	.header-cta .switch-on {
		display: none;
	}
	.header-cta .is-active .switch-on {
		display: block;
	}
	.header-cta__item {
		margin-left: 16px;
		min-width: 20px;
		text-align: center;
	}
	.header-cta__item a {
		display: block;
		height: 100%;
	}
	@media screen and ( min-width: 768px ) {
	.header-cta__item {
		letter-spacing: 0.05em;
	}
	}
	.header-cta__item [class*="icon-"] {
		font-size: 1rem;
	}
	.header-cta__item:last-child {
		position: relative;
		width: 70px;
		height: 60px;
		transition: all 0.3s ease;
	}
	.header-cta__item:last-child .header-cta__inner{
		position: absolute;
		top: 50%;
		left: 0;
		right: 0;
		transform: translateY(-50%);
		letter-spacing: 0.05rem;
		color: #fff;
	}
	.header-cta__label {
		line-height: 1;
		font-size: 0.72727rem;
	}
	@media screen and ( min-width: 768px ) {
	.l-header-row .header-cta {
		position: relative;
	}
	.header-cta__item {
		margin-left: 32px;
	}
	.header-cta__item:last-child {
		width: 86px;
		height: 86px;
	}
	}
	';

	$header_menu = '
	.home:not(.paged).is-overlay .header-menu-default,
	.home:not(.paged).is-overlay .header-menu-center {
		background-color: inherit;
	}
	.header-menu .menu-item {
		position: relative;
		display: flex;
		flex-direction: column;
		justify-content: center;
		cursor: pointer;
		font-size: 0.88889rem;
	}
	.header-menu-default .header-menu > .menu-item,
	.header-menu-center .header-menu > .menu-item {
		padding-right: 24px;
		padding-left: 24px;
		height: 60px;
	}
	.header-menu-row .header-menu > .menu-item {
		padding-right: 16px;
		padding-left: 16px;
		height: 86px;
	}
	.header-menu .menu-item a {
		position: relative;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		transition: all 0.3s ease;
	}
	.header-menu > .menu-item > a::after {
		display: block;
		content: "";
		position: absolute;
		height: 1px;
		right: 0;
		width: 0;
		bottom: -8px;
		transition: 0.3s cubic-bezier(0.13,0.61,0.26,0.94);
	}
	.header-menu > .menu-item:hover > a::after {
		left: 0;
		width: 100%;
	}
	.header-menu > .menu-item > a > .menu-description {
		display: block;
		line-height: 1.2;
		font-weight: 200;
		opacity: 0.8;
	}
	.header-menu .menu-item [class^="icon-"] {
		padding-right: 4px;
	}
	/* Children menu */
	.header-menu .sub-menu {
		visibility: hidden;
		position: absolute;
		top: 100%;
		left: 50%;
		min-width: 200px;
		transform: translateX(-50%);
		transition: all 0.3s ease-in;
		box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.08);
		opacity: 0;
		z-index: 9999;
	}
	.header-menu .menu-item:hover > .sub-menu,
	.header-menu .menu-item.focus > .sub-menu {
		visibility: visible;
		opacity: 1;
	}
	.header-menu .sub-menu .menu-item a {
		display: flex;
		flex-direction: row;
		justify-content: left;
		align-items: center;
	}
	.header-menu .sub-menu .menu-item a,
	.header-row .header-menu .sub-menu .menu-item a {
		position: relative;
		padding-top: 12px;
		padding-bottom: 12px;
		padding-left: 20px;
		padding-right: 20px;
		font-size: 0.72727rem;
	}
	.header-menu .sub-menu .menu-item a:hover {
		background-color: rgba(255,255,255,0.2);
	}
	.header-menu .sub-menu .menu-item ul {
		top: 0;
		left: 100%;
		transform: none;
	}
	.header-menu > .menu-item:first-child >.sub-menu {
		left: 0;
		transform: translateX(0);
	}
	.header-menu > .menu-item:last-child >.sub-menu {
		left: inherit;
		right: 0;
		transform: translateX(0);
	}
	.header-menu > .menu-item:last-child > .sub-menu .menu-item > .sub-menu {
		left: 100%;
		transform: translateX(-200%);
	}
	.header-menu .sub-menu .menu-item-has-children > a::before {
		content: "\e941";
		position: absolute;
		right: 3px;
		transition: all 0.3s ease-in;
		font-family: "icomoon";
		font-size: 0.88889rem;
	}
	.header-menu .sub-menu .menu-item-has-children:hover > a::before {
		right: -1px;
	}
	.header-menu > .menu-item:last-child > .sub-menu .menu-item-has-children > a::before {
		content: "\e940";
		position: absolute;
		left: 4px;
		transition: all 0.3s ease-in;
		font-family: "icomoon";
		font-size: 0.88889rem;
	}
	.header-menu > .menu-item:last-child > .sub-menu .menu-item-has-children:hover > a::before {
		left: 1px;
	}
	/* header menu drop */
	.l-header-menu-drop {
		display: block;
		position: fixed;
		top: 0;
		right: 0;
		left: 0;
		transform: translateY(-100%);
		transition: transform 0.4s ease;
		z-index: 997;
	}
	.l-header-menu-drop.sticky-menu {
		transform: translateY(0);
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
	}
	.l-header-menu-drop__inner .header-menu > .menu-item {
		padding-right: 24px;
		padding-left: 24px;
		height: 56px;
	}
	.l-header-menu-drop__inner .header-menu .menu-item a:focus {
		outline: none;
	}
	';

	$header_panel = '
	.header-panel {
		width: 100%;
	}
	.header-contact,
	.header-searchform {
		display: none;
		position: absolute;
		right: 0;
		left: 0;
		padding-top: 24px;
		padding-bottom: 24px;
		padding-right: 16px;
		padding-left: 16px;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
		z-index: 300;
	}
	.header-contact.is-active,
	.header-searchform.is-active {
		display: block;
		animation: fadeIn 0.2s ease-in;
	}
	.header-language {
		display: none;
		position: absolute;
		top: 100%;
		left: 0;
		min-width: 86px;
		box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.08);
		transition: all 0.2s ease-in;
		z-index: 300;
	}
	.header-language.is-active {
		display: block;
		animation: headerLanguage 0.2s ease-in;
	}
	.language-panel__item {
		padding-top: 6px;
		padding-bottom: 6px;
		padding-left: 12px;
		padding-right: 12px;
		font-size: 0.88889rem;
		transition: all 0.3s ease;
	}
	.language-panel__item a:hover {
		transform: translateX(2px);
	}
	.header-contact__inner {
		text-align: center;
	}
	@media screen and ( max-width: 767px ) {
	.header-contact__inner [class*="col-"] {
		margin-bottom: 24px;
	}
	.header-contact__inner [class*="col-"]:last-child {
		margin-bottom: 0
	}
	}
	.header-contact__inner .small {
		margin-top: 8px;
	}
	';

	$separator = '
	.separator-section-wrapper {
		position: relative;
		overflow: hidden;
		z-index: 100;
	}
	.separator-section-wrapper.separator-double-wave {
		height: 55px;
	}
	.separator-section-wrapper.separator-wave {
		height: 45px;
	}
	.separator-section-wrapper.separator-two-wave {
		height: 30px;
	}
	.separator-section-wrapper.separator-triangle {
		height: 75px;
	}
	.separator-section-wrapper.separator-triangle-center {
		height: 35px;
	}
	.separator-section-wrapper.separator-horizontal {
		height: 64px;
	}
	.separator-section-wrapper.separator-arch,
	.separator-section-wrapper.separator-tilt-right,
	.separator-section-wrapper.separator-tilt-left {
		height: 50px;
	}
	';

	$fixed_footer_menu = '
	.fixed-footer-menu {
		position: fixed;
		bottom: 0;
		right: 0;
		left: 0;
		width: 100%;
		transform: translateY( 100px );
		box-shadow: 0 -1px 1px rgba(0, 0, 0, 0.1);
		transition: 0.6s cubic-bezier(0.13,0.61,0.26,0.94);
		padding-bottom: calc(env(safe-area-inset-bottom) * 0.5);
		z-index: 202;
	}
	.fixed-footer-menu__inner {
		position: relative;
		width: 100%;
		height: 50px;
	}
	.fixed-footer-menu.is-show {
		transform: translateY( 0px );
	}
	.fixed-footer-menu__inner nav {
		position: relative;
		width: 100%;
		height: 50px;
		z-index: 100;
	}
	.fixed-footer-menu__inner ul .menu-item i {
		display: block;
		padding-top: 4px;
		text-align: center;
		font-size: 1rem;
	}
	.fixed-footer-menu__inner ul .menu-item a {
		display: block;
		font-size: 0.72727rem;
		overflow: hidden;
	}
	.sp-follow-sns,
	.sp-share-sns {
		position: fixed;
		bottom: -80px;
		padding-top: 24px;
		padding-bottom: 24px;
		padding-right: 12px;
		padding-left: 12px;
		transform: translateY(0);
		transition: 0.4s cubic-bezier(0.13,0.61,0.26,0.94);
		width: 100%;
		z-index: 201;
	}
	.sp-follow-sns__item a,
	.sp-share-sns__item a,
	.sp-share-sns__item .share-button {
		display: flex;
		align-items: center;
		justify-content: center;
		margin-right: 10px;
		margin-left: 10px;
		width: 32px;
		height: 32px;
		border-radius: 50%;
		box-shadow: 0 1px 1.5px 0 rgba(0,0,0,0.12), 0 1px 1px 0 rgba(0,0,0,0.24);
	}
	.sp-share-sns__item .share-button__clipboard--success,
	.sp-share-sns__item .share-button__clipboard--error {
		border-radius: 50%;
	}
	.sp-follow-sns__item a:hover,
	.sp-share-sns__item a:hover,
	.sp-share-sns__item .share-button:hover {
		box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.2);
	}
	.sp-searchform {
		position: fixed;
		bottom: -375px;
		padding-top: 24px;
		padding-bottom: 24px;
		padding-right: 16px;
		padding-left: 16px;
		transform: translateY(0);
		transition: 0.4s cubic-bezier(0.13,0.61,0.26,0.94);
		width: 100%;
		z-index: 201;
	}
	.sp-follow-sns.is-active,
	.sp-share-sns.is-active,
	.sp-searchform.is-active {
		bottom: 0;
		transform: translateY(-50px);
	}
	.js-fixed-item.sp-follow-sns,
	.js-fixed-item.sp-share-sns,
	.js-fixed-item.sp-searchform {
		background: rgba(0,0,0,0.8);
	}
	';

	$utility_display = '
	.u-display-block {
		display: block;
	}
	.u-display-none {
		display: none;
	}
	.u-display-hidden {
		visibility: hidden;
	}
	.u-display-sp {
		display: block;
	}
	.u-display-tablet {
		display: none;
	}
	.u-display-pc {
		display: none;
	}
	';

	$customer_feedback_header = '
	.customer-feedback-header__img {
		margin: auto;
		height: 100px;
		width: 100px;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		-webkit-mask-image: url('. T_DIRE_URI .'/assets/images/customer.png);
		mask-image: url('. T_DIRE_URI .'/assets/images/customer.png);
	}
	';

	$theme_css = $loading . $keyframes . $foundation_reset . $foundation_html_element . $font_face . $layout_content . $layout_grid . $utility_row . $layout_header . $site_logo . $header_cta . $hamburger_menu . $header_menu . $header_panel . $separator . $fixed_footer_menu . $utility_display . $customer_feedback_header;

	return apply_filters( 'emanon_style_critical_path', emanon_css_minify( $theme_css ) );
}