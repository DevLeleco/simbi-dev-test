"use client";

import React, { useState } from "react";
import type { FunctionComponent } from "react";
import type { BookItemProps } from "./BookItem.interface";
import { Card, CardContent, CardMedia, CardActions, Button, Typography, Tooltip, Modal, Box, TextField, Dialog, DialogActions} from "@mui/material";
import { env } from "@/common/config/env";

// Estilo para o modal
const modalStyle = {
  position: "absolute" as "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
  width: 400,
  bgcolor: "background.paper",
  border: "2px solid #000",
  boxShadow: 24,
  p: 4,
};

export const BookItem: FunctionComponent<BookItemProps> = ({ id, author, title, coverUrl }) => {
  
  const [open, setOpen] = useState(false);
  const [formData, setFormData] = useState({
    bookId: '',
    authorId: '',
    first_name: '',
    last_name: '',
    cpf: '',
    phone: '',
    address: '',
    exit_date: new Date(),
    delivery_date: '',
  });

  // Funções para abrir e fechar o modal
  const handleOpen = () => setOpen(true);
  const handleClose = () => setOpen(false);

  // Função para lidar com mudanças nos inputs
  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async () => {
    try {
      const response = await fetch(`htp://localhost:9000/api/loans/create`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      });

      if (!response.ok) {
        throw new Error("Erro ao cadastrar empréstimo");
      }

      const result = await response.json();
      console.log("Empréstimo cadastrado com sucesso:", result);

      // Fechar o modal após o sucesso
      handleClose();
    } catch (error) {
      console.error("Erro ao cadastrar empréstimo:", error);
    }
  };

  return (
    <Card variant="outlined">
      <CardMedia sx={{ height: 264 }} image={coverUrl ? coverUrl : "/cover.png"} title={title} />
      <CardContent>
        <Tooltip title={title} arrow>
          <Typography gutterBottom variant="h5" noWrap>
            {title}
          </Typography>
        </Tooltip>
        <Typography variant="body2" color="text.secondary">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non arcu...
        </Typography>
      </CardContent>
      <CardActions>
        {/* Botão para abrir o modal */}
        <Button size="medium" variant="contained" onClick={handleOpen}>
          Empréstimo
        </Button>
      </CardActions>
      <Modal open={open} onClose={handleClose} aria-labelledby="modal-title" aria-describedby="modal-description" id={id}>
        <Box sx={modalStyle}>
          <Typography id="modal-title" variant="h6" component="h2">
            Preencha os Dados do Empréstimo
          </Typography>
        <Box component="form" noValidate autoComplete="off" sx={{ mt: 2 }}>
          <TextField fullWidth label="Primeiro Nome" name="first_name" margin="normal" value={formData.first_name} onChange={handleChange} />
          <TextField fullWidth label="Último Nome" name="last_name" margin="normal" value={formData.last_name} onChange={handleChange} />
          <TextField fullWidth label="CPF" name="cpf" margin="normal" value={formData.cpf} onChange={handleChange} />
          <TextField fullWidth label="Telefone" name="phone" margin="normal" value={formData.phone} onChange={handleChange} />
          <TextField fullWidth label="Endereço" name="address" margin="normal" value={formData.address} onChange={handleChange} />
          <TextField fullWidth label="Data de Devolução" name="delivery_date" margin="normal" type="date" InputLabelProps={{ shrink: true }} value={formData.delivery_date} onChange={handleChange} />
          <input type="hidden" name="livroId" value={formData.bookId=id} />
          <input type="hidden" name="livroId" value={formData.authorId=author.id} />
        </Box>
          <DialogActions>
            <Button variant="contained" color="primary" onClick={handleSubmit}>
              Confirmar
            </Button>
            <Button variant="contained" color="secondary"  onClick={handleClose}>
              Cancelar
            </Button>
          </DialogActions>
        </Box>
      </Modal>
    </Card>
  );
};
