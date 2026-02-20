import "bootstrap/dist/css/bootstrap.min.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

import TemplateAuth from "./templates/TemplateAuth";
import TemplateCatalog from "./templates/TemplateCatalog";

import Home from "./pages/Home";

import Login from "./pages/Login";
import Register from "./pages/Register";

import Catalog from "./pages/Catalog";

import Page404 from "./pages/Page404";

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route index element={<Home />} />

          <Route path="/entrar" element={<TemplateAuth />}>
            <Route index element={<Login />} />
          </Route>

          <Route path="/cadastrar" element={<TemplateAuth />}>
            <Route index element={<Register />} />
          </Route>

          <Route path="/catalogo" element={<TemplateCatalog />}>
            <Route index element={<Catalog />} />
          </Route>

          <Route path="*" element={<Page404 />} />
        </Routes>
      </BrowserRouter>

      <ToastContainer
        position="bottom-right"
        autoClose={4000}
        hideProgressBar={false}
        newestOnTop
        closeOnClick
        pauseOnHover
        theme="colored"
      />
    </>
  );
}

export default App;
