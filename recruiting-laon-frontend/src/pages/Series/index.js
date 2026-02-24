import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import api from "../../utils/api";
import ContainerGrid from "../../components/ContainerGrid";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import { useNavigate } from "react-router-dom";
import CircleSvg from "../../components/CircleSvg";

export default function Series() {
  const [series, setSeries] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [lastPage, setLastPage] = useState(1);
  const [loading, setLoading] = useState(false);
  const [valueSearch, setValueSearch] = useState("");

  const navigate = useNavigate();

  const fetchSeries = async (search = "", page = 1) => {
    try {
      setLoading(true);

      const status = "released";

      const response = await api.get("/series", {
        params: { search, page, status },
      });

      const data = response.data;

      setSeries(data.data || []);
      setLastPage(data.last_page);
    } catch (error) {
      toast.error(
        error.response?.data?.message || "Erro ao carregar as séries.",
      );
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    const delayDebounce = setTimeout(() => {
      fetchSeries(valueSearch, currentPage);
    }, 500);

    return () => clearTimeout(delayDebounce);
  }, [valueSearch, currentPage]);

  const handleNext = () => {
    if (currentPage < lastPage) {
      setCurrentPage((prev) => prev + 1);
    }
  };

  const handlePrev = () => {
    if (currentPage > 1) {
      setCurrentPage((prev) => prev - 1);
    }
  };

  return (
    <section className={styles.search_container}>
      {loading && <Loader />}

      <h1 className={`semibold_40 color_white mb-4 ${styles.search_title}`}>
        <CircleSvg variant={"back"} onClick={() => navigate(-1)} /> Séries
      </h1>

      <input
        type="text"
        value={valueSearch}
        onChange={(e) => setValueSearch(e.target.value)}
        placeholder="Digite aqui a série que procura..."
        className={styles.search_input_container}
      />

      {loading ? (
        <Loader />
      ) : series.length === 0 ? (
        <ContainerGrid
          description="Séries"
          disableNext={true}
          disablePrev={true}
        >
          <p className="color_gray_500">Nenhuma serie encontrada</p>{" "}
        </ContainerGrid>
      ) : (
        <ContainerGrid
          description="Séries"
          variant={"series"}
          onClickNext={handleNext}
          onClickPrev={() => handlePrev()}
          disableNext={currentPage >= lastPage}
          disablePrev={currentPage <= 1}
          films={series}
        />
      )}
    </section>
  );
}
