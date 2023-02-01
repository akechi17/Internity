import _ from "lodash";
window._ = _;

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// import bootstrap
import "../css/app.scss";

// Import bootstrap JS
import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;
import "./template/core/bootstrap.bundle.min.js";
import "iconify-icon";

import Trix from "trix";
