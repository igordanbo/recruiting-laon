import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { toast } from "react-toastify";
import api from "../../api/api";
import styles from "./styles.module.css";
import Loader from "../../components/Loader";
import ContainerLeftSingleFilm from "../../components/ContainerLeftSingleFilm";
import ContainerRightSingleFilm from "../../components/ContainerRightSingleFilm";
import SeasonsContainer from "../../components/SeasonsContainer";
import { useAuth } from "../../auth/useAuth";

export default function SingleSerie() {
  const { id } = useParams();
  const { user } = useAuth();

  const [serie, setSerie] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);
  const [isFavorite, setIsFavorite] = useState(false);

  useEffect(() => {
    async function fetchSerie() {
      try {
        setLoading(true);
        setError(false);

        const response = await api.get(`/series/${id}`);
        setSerie(response.data);

        await checkIfFavorite(id);
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

  const checkIfFavorite = async (serieId) => {
    try {
      const response = await api.get(`/users/${user?.user.id}`);

      const favorites = response.data.user.series || [];

      const exists = favorites.some((serie) => serie.id === Number(serieId));

      setIsFavorite(exists);
    } catch (error) {
      console.error("Erro ao verificar favorito", error);
    }
  };

  const toggleFavorite = async () => {
    try {
      if (isFavorite) {
        await api.delete(`/series/${id}/users`, {
          data: {
            id_serie: id,
            id_user: user?.user.id,
          },
        });

        setIsFavorite(false);
        toast.info("Removido dos favoritos");
      } else {
        await api.post(`/series/${id}/users`, {
          id_serie: id,
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

  if (!serie) {
    return <p>Série não encontrada.</p>;
  }

  return (
    <section className={` ${styles.section_single_serie} `}>
      <div className={` ${styles.main_container_single_serie} `}>
        <ContainerLeftSingleFilm
          isFavorite={isFavorite}
          onClickFavorite={toggleFavorite}
          src={serie?.image_url}
          to={serie?.trailer_url}
        />

        <ContainerRightSingleFilm
          title={serie?.title}
          originalTitle={serie?.original_title}
          year={serie?.year}
          duration={null}
          seasons={serie?.seasons.length}
          categories={serie?.categories}
          sinopsys={serie?.synopsis}
          cast={serie?.actors}
          awards={serie?.awards}
          director={serie?.director}
          ratings={serie?.ratings}
          isFavorite={isFavorite}
          onClickFavorite={toggleFavorite}
        />
      </div>
      <SeasonsContainer serie={serie} />
    </section>
  );
}
