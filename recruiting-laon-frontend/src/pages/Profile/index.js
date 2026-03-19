import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import { useNavigate } from "react-router-dom";
import { useOutletContext } from "react-router-dom";

import styles from "./styles.module.css";
import api from "../../api/api";

import BoxUserEditInfo from "../../components/BoxUserEditInfo";
import LrButtonPrimary from "../../components/LrButtonPrimary";
import LrButtonSecondary from "../../components/LrButtonSecondary";
import LrInputDateAdmin from "../../components/LrInputDateAdmin";
import LrInputTextAdmin from "../../components/LrInputTextAdmin";
import LrSelectAdmin from "../../components/LrSelectAdmin";
import Modal from "../../components/Modal";

export default function Profile() {
  const [loading, setLoading] = useState(false);
  const [errors, setErrors] = useState({});
  const [isChange, setIsChange] = useState(false);
  const [openModalConfirm, setOpenModalConfirm] = useState(false);

  const [formData, setFormData] = useState({
    name: "",
    email: "",
    birth_date: "",
    gender: "",
    password: "",
    password_confirmation: "",
  });

  const navigate = useNavigate();

  const { setIsDirty } = useOutletContext();

  const fetchUserData = async () => {
    setLoading(true);

    try {
      const response = await api.get("/me");

      const data = response.data;

      setFormData((prev) => ({
        ...prev,
        id: data.user?.id,
        name: data.user?.name || "",
        email: data.user?.email || "",
        birth_date: formatDateToInput(data.user?.birth_date),
        gender: data.user?.gender || "",
      }));
    } catch (error) {
      console.error("Erro ao buscar dados do usuário:", error);
      toast.error(
        error.response?.data?.message ||
          "Erro ao carregar os dados do usuário.",
      );
    } finally {
      setLoading(false);
    }
  };

  const formatDateToInput = (date) => {
    if (!date) return "";

    const [year, month, day] = date.split("-");
    return `${day}/${month}/${year}`;
  };

  const formatDateToApi = (date) => {
    if (!date) return "";

    const [day, month, year] = date.split("/");
    return `${year}-${month}-${day}`;
  };

  const handleChange = (event) => {
    setIsDirty(true);
    setIsChange(true);

    const { name, value } = event.target;

    setFormData({
      ...formData,
      [name]: value,
    });

    setErrors((prev) => ({
      ...prev,
      [name]: false,
    }));
  };

  const handleSubmit = async () => {
    let newErrors = {};

    if (!formData.name || formData.name.length < 3) {
      newErrors.name = true;
      toast.error("O nome deve ter pelo menos 3 caracteres");
    }

    if (!formData.email || !/\S+@\S+\.\S+/.test(formData.email)) {
      newErrors.email = true;
      toast.error("Insira um email válido");
    }

    if (formData.birth_date) {
      const dateRegex = /^\d{2}\/\d{2}\/\d{4}$/;

      if (!dateRegex.test(formData.birth_date)) {
        newErrors.birth_date = true;
        toast.error("Insira uma data válida no formato DD/MM/AAAA");
      }
    }

    if (formData.password || formData.password_confirmation) {
      if (!formData.password || !formData.password_confirmation) {
        newErrors.password = true;
        newErrors.password_confirmation = true;
        toast.error("Preencha os dois campos de senha");
      } else if (formData.password !== formData.password_confirmation) {
        newErrors.password = true;
        newErrors.password_confirmation = true;
        toast.error("As senhas não coincidem");
      }
    }

    setErrors(newErrors);

    if (Object.keys(newErrors).length > 0) {
      return;
    }

    try {
      let payload = {};

      payload.name = formData.name;
      payload.email = formData.email;

      payload.gender = formData.gender || null;

      payload.birth_date = formData.birth_date
        ? formatDateToApi(formData.birth_date)
        : null;

      if (formData.password) {
        payload.password = formData.password;
        payload.password_confirmation = formData.password_confirmation;
      }

      if (formData.password || formData.password_confirmation) {
        if (!formData.password || !formData.password_confirmation) {
          toast.error("Preencha os dois campos de senha");
          return;
        }

        if (formData.password !== formData.password_confirmation) {
          toast.error("As senhas não coincidem");
          return;
        }

        payload.password = formData.password;
        payload.password_confirmation = formData.password_confirmation;
      }

      await api.put(`/users/${formData.id}`, payload);

      toast.success("Perfil atualizado com sucesso");
      setIsDirty(false);
    } catch (error) {
      toast.error(error.response?.data?.message || "Erro ao atualizar perfil");
    }
  };

  useEffect(() => {
    fetchUserData();
  }, []);

  return (
    <section className={styles.profile_container}>
      <BoxUserEditInfo
        title={`Editar dados`}
        description={`Altere seus dados de usuário.`}
      >
        <LrInputTextAdmin
          label="Nome"
          name="name"
          type="text"
          value={formData?.name}
          onChange={(event) => handleChange(event)}
          error={errors?.name}
        />

        <LrInputTextAdmin
          label="Email"
          name="email"
          type="email"
          value={formData?.email}
          onChange={(event) => handleChange(event)}
          error={errors?.email}
        />

        <LrInputDateAdmin
          label="Data de nascimento"
          name="birth_date"
          value={formData?.birth_date}
          onChange={(event) => handleChange(event)}
          error={errors?.birth_date}
        />

        <LrSelectAdmin
          value={formData?.gender}
          label="Sexo"
          name="gender"
          options={[
            { value: "male", label: "Masculino" },
            { value: "female", label: "Feminino" },
            { value: "other", label: "Outro" },
          ]}
          onChange={(event) => handleChange(event)}
          error={errors?.gender}
        />
      </BoxUserEditInfo>

      <BoxUserEditInfo
        title={`Alterar senha`}
        description={`Preencha os campos abaixo se quiser trocar sua senha.`}
      >
        <LrInputTextAdmin
          label="Senha"
          name="password"
          type="password"
          autoComplete="new-password"
          value={formData.password}
          onChange={handleChange}
        />

        <LrInputTextAdmin
          label="Confirmar senha"
          name="password_confirmation"
          type="password"
          autoComplete="new-password"
          value={formData.password_confirmation}
          onChange={handleChange}
        />
      </BoxUserEditInfo>
      <div
        className={`width_100 display_flex gap_16 align_items_center justify_content_flex_end ${styles.buttons_profile}`}
      >
        <LrButtonSecondary
          title={`Cancelar`}
          text={`Cancelar`}
          adicionalClassName={`width_max_content`}
          variant={`small`}
          onClick={() => (isChange ? setOpenModalConfirm(true) : navigate(-1))}
        />

        <LrButtonPrimary
          title={`Salvar alterações`}
          text={`Salvar alterações`}
          adicionalClassName={`width_max_content`}
          variant={`small`}
          onClick={handleSubmit}
        />
      </div>

      {openModalConfirm && (
        <Modal
          title={`Deseja realmente sair?`}
          type={`info`}
          onClickClose={() => setOpenModalConfirm(false)}
          onClickBtnSec={() => setOpenModalConfirm(false)}
          onClickBtnPri={() => navigate(-1)}
          titleBtnSec={"Cancelar"}
          titleBtnPri={"Confirmar"}
        >
          <p className="color_gray_500">
            Tem certeza que deseja cancelar? Suas alterações não serão salvas.
          </p>
        </Modal>
      )}
    </section>
  );
}
