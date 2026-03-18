import { use, useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { toast } from "react-toastify";
import api from "../../api/api";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import ContainerLeftSingleFilm from "../../components/ContainerLeftSingleFilm";
import ContainerRightSingleFilm from "../../components/ContainerRightSingleFilm";
import { useAuth } from "../../auth/useAuth";

export default function SingleFilm() {
  const { id } = useParams();
  const { user } = useAuth();

  const [film, setFilm] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);
  const [isFavorite, setIsFavorite] = useState(false);

  useEffect(() => {
    async function fetchFilm() {
      try {
        setLoading(true);
        setError(false);

        const response = await api.get(`/films/${id}`);
        setFilm(response.data);

        await checkIfFavorite(id);
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

  const checkIfFavorite = async (filmId) => {
    try {
      const response = await api.get(`/users/${user?.user.id}`);

      const favorites = response.data.user.films || [];

      const exists = favorites.some((film) => film.id === Number(filmId));

      setIsFavorite(exists);
    } catch (error) {
      console.error("Erro ao verificar favorito", error);
    }
  };

  const toggleFavorite = async () => {
    try {
      if (isFavorite) {
        await api.delete(`/films/${id}/users`, {
          data: {
            id_film: id,
            id_user: user?.user.id,
          },
        });

        setIsFavorite(false);
        toast.info("Removido dos favoritos");
      } else {
        await api.post(`/films/${id}/users`, {
          id_film: id,
          id_user: user?.user.id,
        });

        setIsFavorite(true);
        toast.success("Adicionado aos favoritos");
      }
    } catch (error) {
      console.error("Erro ao atualizar favorito", error);

      toast.error(
        error.response?.data?.message || "Erro ao atualizar favoritos.",
      );
    }
  };

  if (loading) return <Loader />;

  if (!film) {
    return <p>Filme não encontrado.</p>;
  }

  return (
    <section className={` ${styles.main_container_single_film} `}>
      <ContainerLeftSingleFilm
        onClickFavorite={toggleFavorite}
        src={film?.image_url}
        to={film?.trailer_url}
        isFavorite={isFavorite}
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
        to={film?.trailer_url}
        isFavorite={isFavorite}
        onClickFavorite={toggleFavorite}
      />
    </section>
  );
}
