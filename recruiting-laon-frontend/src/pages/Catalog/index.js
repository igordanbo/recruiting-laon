import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import { useNavigate } from "react-router-dom";
import api from "../../api/api";
import ContainerGrid from "../../components/ContainerGrid";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import SliderFilteredFilms from "../../components/SliderFilteredFilms";

export default function Catalog() {
  const [films, setFilms] = useState([]);
  const [filteredFilms, setFilteredFilms] = useState([]);
  const [series, setSeries] = useState([]);
  const [loading, setLoading] = useState(false);

  const navigate = useNavigate();

  const fetchFilms = async () => {
    try {
      setLoading(true);

      const response = await api.get("/films", {
        params: { limit: null, status: "released" },
      });

      const data = response.data;

      setFilms(data.data || []);
    } catch (error) {
      console.error("Erro ao buscar filmes:", error);

      toast.error(
        error.response?.data?.message || "Erro ao carregar os filmes.",
      );
    } finally {
      setLoading(false);
    }
  };

  const fetchSeries = async () => {
    try {
      setLoading(true);

      const response = await api.get("/series", {
        params: { limit: null },
      });

      const data = response.data;

      setSeries(data.data || []);
    } catch (error) {
      console.error("Erro ao buscar series:", error);

      toast.error(
        error.response?.data?.message || "Erro ao carregar os series.",
      );
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchFilms();
    fetchSeries();
  }, []);

  if (loading) {
    return <Loader />;
  }

  return (
    <section className={styles.catalog_container}>
      <h1 className={`semibold_40 color_white mb-4 ${styles.catalog_title}`}>
        Populares
      </h1>

      {loading ? (
        <Loader />
      ) : films.length === 0 ? (
        <p className="text-white">Nenhum filme encontrado.</p>
      ) : (
        <ContainerGrid films={films} variant="films" description="Filmes" />
      )}

      {loading ? (
        <Loader />
      ) : series.length === 0 ? (
        <p className="text-white">Nenhuma série encontrada.</p>
      ) : (
        <ContainerGrid films={series} variant="series" description="Séries" />
      )}
    </section>
  );
}
