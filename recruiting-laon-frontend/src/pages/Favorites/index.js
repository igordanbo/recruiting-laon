import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import { useAuth } from "../../auth/useAuth";

import api from "../../api/api";
import ContainerGrid from "../../components/ContainerGrid";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import LrButtonPrimary from "../../components/LrButtonPrimary";
import { useNavigate } from "react-router-dom";

export default function Favorites() {
  const { user } = useAuth();
  const [films, setFilms] = useState([]);
  const [series, setSeries] = useState([]);
  const [loading, setLoading] = useState(false);

  const navigate = useNavigate();

  const fetchFavorites = async () => {
    try {
      setLoading(true);

      const response = await api.get(`/users/${user?.user.id}`);

      const data = response.data.user;

      setFilms(data.films || []);
      setSeries(data.series || []);
    } catch (error) {
      toast.error(
        error.response?.data?.message || "Erro ao carregar favoritos.",
      );
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchFavorites();
  }, []);

  if (loading) {
    return <Loader />;
  }

  return (
    <section className={styles.catalog_container}>
      <h1 className={`semibold_40 color_white mb-4 ${styles.catalog_title} `}>
        Seus Favoritos
      </h1>

      {loading ? (
        <Loader />
      ) : films.length === 0 ? (
        <p className={`${styles.catalog_result_badge} `}>
          Nenhum filme favoritado.
        </p>
      ) : (
        <ContainerGrid films={films} variant="films" description="Seus filmes favoritos" />
      )}

      {loading ? (
        <Loader />
      ) : series.length === 0 ? (
        <p className={`${styles.catalog_result_badge} `}>
          Nenhuma série favoritada.
        </p>
      ) : (
        <ContainerGrid films={series} variant="series" description="Suas séries favoritas" />
      )}

      {series.length === 0 && films.length === 0 && (
        <LrButtonPrimary
          text={"Começar a favoritar agora!"}
          onClick={() => navigate("/catalogo/busca")}
        />
      )}
    </section>
  );
}
