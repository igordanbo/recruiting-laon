import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { toast } from "react-toastify";
import api from "../../utils/api";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import ContainerLeftSingleFilm from "../../components/ContainerLeftSingleFilm";
import ContainerRightSingleFilm from "../../components/ContainerRightSingleFilm";

export default function SingleFilm() {
  const { id } = useParams();

  const [film, setFilm] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    async function fetchFilm() {
      try {
        setLoading(true);
        setError(false);

        const response = await api.get(`/films/${id}`);
        setFilm(response.data);
      } catch (err) {
        setError(true);
      } finally {
        setLoading(false);
      }
    }

    fetchFilm();
  }, [id]);

  useEffect(() => {
    if (error) {
      toast.error("Erro ao carregar o filme.");
    }
  }, [error]);

  useEffect(() => {
    console.log(film);
  }, [film]);

  if (loading) return <Loader />;

  if (!film) {
    return <p>Filme não encontrado.</p>;
  }

  return (
    <section className={` ${styles.main_container_single_film} `}>
      <ContainerLeftSingleFilm
        src={film?.image_url}
        to={film?.trailer_url}
        linkText="Assistir o Trailer"
      />

      <ContainerRightSingleFilm
        title={film?.title}
        originalTitle={film?.original_title}
        year={film?.year}
        duration={film?.duration}
        categories={film?.categories}
        sinopsys={film?.synopsis}
        cast={film?.actors}
        awards={film?.awards}
        director={film?.director}
        ratings={film?.ratings}
      />
    </section>
  );
}
