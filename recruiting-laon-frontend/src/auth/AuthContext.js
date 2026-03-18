import { createContext, useState, useEffect } from "react";
import { getUser, login, logout, register } from "../services/authService";

export const AuthContext = createContext();

export function AuthProvider({ children }) {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);

  async function fetchUser() {
    try {
      const data = await getUser();
      setUser(data);
    } catch {
      setUser(null);
    } finally {
      setLoading(false);
    }
  }

  useEffect(() => {
    fetchUser();
  }, []);

  async function handleLogin(credentials) {
    try {
      await login(credentials);
      await fetchUser();
    } catch (error) {
      console.log(error.response.data);
      throw error;
    }
  }

  async function handleRegister(data) {
    try {
      await register(data);
      await fetchUser();
    } catch (error) {
      throw error;
    }
  }

  async function handleLogout() {
    try {
      await logout();
      setUser(null);
    } catch (error) {
      throw error;
    }
  }

  return (
    <AuthContext.Provider
      value={{
        user,
        loading,
        login: handleLogin,
        register: handleRegister,
        logout: handleLogout,
      }}
    >
      {children}
    </AuthContext.Provider>
  );
}
