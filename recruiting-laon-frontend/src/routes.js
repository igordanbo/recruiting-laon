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
import Search from "./pages/Search";

import SingleFilm from "./pages/SingleFilm";

import Page404 from "./pages/Page404";
import TemplateFilm from "./templates/TemplateFilm";
import Films from "./pages/Films";
import Series from "./pages/Series";
import SingleSerie from "./pages/SingleSerie";

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
            <Route path="busca" element={<Search />} />
            <Route path="filmes" element={<Films />} />
            <Route path="series" element={<Series />} />
          </Route>

          <Route path="/filmes" element={<TemplateFilm />}>
            <Route path="filme/:id" element={<SingleFilm />} />
          </Route>

          <Route path="/series" element={<TemplateFilm />}>
            <Route path="serie/:id" element={<SingleSerie />} />
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
