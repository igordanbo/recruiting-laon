import { Outlet, Navigate } from "react-router-dom";
import MainCatalogContainer from "../../components/MainCatalogContainer";
import api from "../../utils/api";
import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import Loader from "../../components/Loader";

export default function TemplateCatalog() {
  const token = localStorage.getItem("lr_api_token");

  const [isAuthenticated, setIsAuthenticated] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const checkLogin = async () => {
      if (!token) {
        setIsAuthenticated(false);
        setLoading(false);
        return;
      }

      try {
        await api.get("/me", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        });

        setIsAuthenticated(true);
      } catch (error) {
        localStorage.removeItem("lr_api_token");
        setIsAuthenticated(false);
      } finally {
        setLoading(false);
      }
    };

    checkLogin();
  }, [token]);

  useEffect(() => {
    if (isAuthenticated === false) {
      toast.error("Faça login para acessar o catálogo");
    }
  }, [isAuthenticated]);

  if (loading) {
    return <Loader />;
  }

  if (!isAuthenticated) {
    return <Navigate to="/entrar" replace />;
  }

  return (
    <MainCatalogContainer>
      <Outlet />
    </MainCatalogContainer>
  );
}
