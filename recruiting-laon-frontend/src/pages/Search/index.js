import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import api from "../../utils/api";
import ContainerGrid from "../../components/ContainerGrid";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import { useNavigate } from "react-router-dom";
import CircleSvg from "../../components/CircleSvg";

export default function Search() {
  const [films, setFilms] = useState([]);
  const [series, setSeries] = useState([]);

  const [currentPageFilms, setCurrentPageFilms] = useState(1);
  const [currentPageSeries, setCurrentPageSeries] = useState(1);

  const [lastPageFilms, setLastPageFilms] = useState(1);
  const [lastPageSeries, setLastPageSeries] = useState(1);

  const [loading, setLoading] = useState(false);
  const [valueSearch, setValueSearch] = useState("");

  const navigate = useNavigate();

  const fetchFilms = async (search = "", page = 1) => {
    try {
      setLoading(true);

      const status = "released";

      const response = await api.get("/films", {
        params: { search, page, status },
      });

      const data = response.data;

      setFilms(data.data || []);
      setLastPageFilms(data.last_page);
    } catch (error) {
      toast.error(
        error.response?.data?.message || "Erro ao carregar os filmes.",
      );
    } finally {
      setLoading(false);
    }
  };

  const fetchSeries = async (search = "", page = 1) => {
    try {
      setLoading(true);

      const status = "released";

      const response = await api.get("/series", {
        params: { search, page, status },
      });

      const data = response.data;

      setSeries(data.data || []);
      setLastPageSeries(data.last_page);
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
    const delayDebounce = setTimeout(() => {
      fetchFilms(valueSearch, currentPageFilms);
      fetchSeries(valueSearch, currentPageSeries);
    }, 500);

    return () => clearTimeout(delayDebounce);
  }, [valueSearch, currentPageFilms, currentPageSeries]);

  const handleNextFilms = () => {
    if (currentPageFilms < lastPageFilms) {
      setCurrentPageFilms((prev) => prev + 1);
    }
  };

  const handlePrevFilms = () => {
    if (currentPageFilms > 1) {
      setCurrentPageFilms((prev) => prev - 1);
    }
  };

  const handleNextSeries = () => {
    if (currentPageSeries < lastPageSeries) {
      setCurrentPageSeries((prev) => prev + 1);
    }
  };

  const handlePrevSeries = () => {
    if (currentPageSeries > 1) {
      setCurrentPageSeries((prev) => prev - 1);
    }
  };

  return (
    <section className={styles.search_container}>
      {loading && <Loader />}

      <h1 className={`semibold_40 color_white mb-4 ${styles.search_title}`}>
        <CircleSvg variant={"back"} onClick={() => navigate(-1)} /> Buscar por
        filmes e séries
      </h1>

      <input
        type="text"
        value={valueSearch}
        onChange={(e) => setValueSearch(e.target.value)}
        placeholder="Digite aqui o filme ou a série..."
        className={styles.search_input_container}
      />

      {loading ? (
        <Loader />
      ) : films.length === 0 ? (
        <ContainerGrid
          description="Filmes"
          disableNext={true}
          disablePrev={true}
        >
          {" "}
          <p className={`color_gray_500 ${styles.empty}`}>
            Nenhum filme encontrado
          </p>{" "}
        </ContainerGrid>
      ) : (
        <ContainerGrid
          description="Filmes"
          variant="films"
          onClickNext={handleNextFilms}
          onClickPrev={handlePrevFilms}
          disableNext={currentPageFilms >= lastPageFilms}
          disablePrev={currentPageFilms <= 1}
          films={films}
        />
      )}

      {loading ? (
        <Loader />
      ) : series.length === 0 ? (
        <ContainerGrid
          description="Séries"
          disableNext={true}
          disablePrev={true}
        >
          {" "}
          <p className={`color_gray_500 ${styles.empty}`}>
            Nenhuma série encontrada
          </p>{" "}
        </ContainerGrid>
      ) : (
        <ContainerGrid
          description="Séries"
          variant="series"
          onClickNext={handleNextSeries}
          onClickPrev={handlePrevSeries}
          disableNext={currentPageSeries >= lastPageSeries}
          disablePrev={currentPageSeries <= 1}
          films={series}
        />
      )}
    </section>
  );
}
