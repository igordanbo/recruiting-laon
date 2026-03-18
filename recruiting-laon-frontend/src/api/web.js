import axios from "axios";

const web = axios.create({
  baseURL: "http://localhost:8000",
  withCredentials: true,
});

web.defaults.withXSRFToken = true;

export default web;
