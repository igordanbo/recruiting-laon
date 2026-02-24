import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import api from "../../utils/api";
import ContainerGrid from "../../components/ContainerGrid";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import { useNavigate } from "react-router-dom";
import SliderFilteredFilms from "../../components/SliderFilteredFilms";

export default function Catalog() {
  const [films, setFilms] = useState([]);
  const [filteredFilms, setFilteredFilms] = useState([]);
  const [series, setSeries] = useState([]);
  const [loading, setLoading] = useState(false);
  const [isMobile, setIsMobile] = useState(false);

  const navigate = useNavigate();

  const fetchFilms = async () => {
    try {
      setLoading(true);

      const response = await api.get("/films");

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

      const response = await api.get("/series");

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

  const fetchFilteredFilms = async () => {
    try {
      setLoading(true);

      const status = "upcoming";

      const response = await api.get("/films", {
        params: { status },
      });

      const data = response.data;

      setFilteredFilms(data.data || []);
    } catch (error) {
      toast.error(
        error.response?.data?.message || "Erro ao carregar os filmes.",
      );
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    if (window.innerWidth < 1000) {
      setIsMobile(true);
    }

    fetchFilms();
    fetchSeries();
    fetchFilteredFilms();
  }, []);

  if (loading) {
    return <Loader />;
  }

  return (
    <section className={styles.catalog_container}>
      {isMobile && filteredFilms && (
        <SliderFilteredFilms films={filteredFilms} />
      )}

      <h1 className={`semibold_40 color_white mb-4 ${styles.catalog_title}`}>
        Populares
      </h1>

      {loading ? (
        <Loader />
      ) : films.length === 0 ? (
        <p className="text-white">Nenhum filme encontrado.</p>
      ) : (
        <ContainerGrid
          films={films}
          variant="films"
          description="Filmes"
          disablePrev={true}
          onClickNext={() => {
            navigate("/catalogo/filmes");
          }}
        />
      )}

      {console.log(series)}
      {loading ? (
        <Loader />
      ) : series.length === 0 ? (
        <p className="text-white">Nenhuma série encontrada.</p>
      ) : (
        <ContainerGrid
          films={series}
          variant="series"
          description="Série"
          disablePrev={true}
          onClickNext={() => {
            navigate("/catalogo/series");
          }}
        />
      )}
    </section>
  );
}
