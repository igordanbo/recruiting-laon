import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { toast } from "react-toastify";
import api from "../../utils/api";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import ContainerLeftSingleFilm from "../../components/ContainerLeftSingleFilm";
import ContainerRightSingleFilm from "../../components/ContainerRightSingleFilm";
import SeasonsContainer from "../../components/SeasonsContainer";

export default function SingleSerie() {
  const { id } = useParams();

  const [serie, setSerie] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    async function fetchSerie() {
      try {
        setLoading(true);
        setError(false);

        const response = await api.get(`/series/${id}`);
        setSerie(response.data);
      } catch (err) {
        setError(true);
      } finally {
        setLoading(false);
      }
    }

    fetchSerie();
  }, [id]);

  useEffect(() => {
    if (error) {
      toast.error("Erro ao carregar a série.");
    }
  }, [error]);

  useEffect(() => {
    console.log(serie);
  }, [serie]);

  if (loading) return <Loader />;

  if (!serie) {
    return <p>Série não encontrada.</p>;
  }

  return (
    <section className={` ${styles.section_single_serie} `}>
      <div className={` ${styles.main_container_single_serie} `}>
        <ContainerLeftSingleFilm
          src={serie?.image_url}
          to={serie?.trailer_url}
          linkText="Assistir o Trailer"
        />

        <ContainerRightSingleFilm
          title={serie?.title}
          originalTitle={serie?.original_title}
          year={serie?.year}
          duration={serie?.duration}
          categories={serie?.categories}
          sinopsys={serie?.synopsis}
          cast={serie?.actors}
          awards={serie?.awards}
          director={serie?.director}
          ratings={serie?.ratings}
        />
      </div>
      <SeasonsContainer serie={serie} />
    </section>
  );
}
