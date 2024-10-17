import type { FunctionComponent } from "react";
import React, { useEffect, useState } from "react";
import TextField from "@mui/material/TextField";
import { Button, Dialog, DialogActions, DialogContent, DialogTitle} from "@mui/material";


export const LoanModal: FunctionComponent = ({}) => {

    // Estado para o modal de edição
  const [openEditModal, setOpenEditModal] = useState(false);
  const [selectedBook, setSelectedBook] = useState<Book | null>(null);


  // Função para abrir o modal de edição
  const handleEdit = (book: Book) => {
    setSelectedBook(book); // Definindo o livro selecionado
    setOpenEditModal(true); // Abrindo o modal
  };

  // Função para fechar o modal de edição
  const handleCloseEditModal = () => {
    setOpenEditModal(false);
  };

  // Função para salvar as alterações
  const handleSaveEdit = () => {
    // Aqui você pode implementar a lógica de salvar os dados editados na API
    alert("Alterações salvas!");
    setOpenEditModal(false);
  };

  return (
    <DialogContent>
          <TextField
            margin="dense"
            label="Título"
            fullWidth
            value={selectedBook?.title || ""}
            onChange={(e) =>
              setSelectedBook((prev) => prev ? { ...prev, title: e.target.value } : null)
            }
          />
          <TextField
            margin="dense"
            label="Autor"
            fullWidth
            value=""
            onChange={(e) =>
              setSelectedBook((prev) => prev ? { ...prev, author: e.target.value } : null)
            }
          />
          <TextField
            margin="dense"
            label="Gênero"
            fullWidth
            value=""
            onChange={(e) =>
              setSelectedBook((prev) => prev ? { ...prev, genre: e.target.value } : null)
            }
          />
          <TextField
            margin="dense"
            label="Ano de Publicação"
            fullWidth
            value=""
            onChange={(e) =>
              setSelectedBook((prev) => prev ? { ...prev, year: parseInt(e.target.value) } : null)
            }
          />
          <TextField
            margin="dense"
            label="Editora"
            fullWidth
            value=""
            onChange={(e) =>
              setSelectedBook((prev) => prev ? { ...prev, publisher: e.target.value } : null)
            }
          />
          <TextField
            margin="dense"
            label="Data de Publicação"
            type="date"
            fullWidth
            value={selectedBook?.date || ""}
            inputProps={{}}
            onChange={(e) =>
              setSelectedBook((prev) => prev ? { ...prev, date: e.target.value } : null)
            }
          />
        </DialogContent>
  );
};
