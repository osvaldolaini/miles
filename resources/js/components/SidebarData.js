import React from "react";
//icons
import HomeIcon from '@mui/icons-material/Home';
import QuestionAnswerIcon from '@mui/icons-material/QuestionAnswer';
import BookmarkRemove from '@mui/icons-material/BookmarkRemove';
import BookmarkAdd from '@mui/icons-material/BookmarkAdd';

const appurlmeta    = document.querySelector("meta[name='app_url']");
if(appurlmeta){
    const APP_URL       = appurlmeta.getAttribute("content");
}

export const SidebarData = [
    {
        title: "Home",
        icon: <HomeIcon fontSize="small" color="action" />,
        link: APP_URL+"/app"
    },
    {
        title: "Chat",
        icon: <QuestionAnswerIcon fontSize="small" color="action" />,
        link: APP_URL+"/chat"
    },
    {
        title: "Meus pedidos",
        icon: <BookmarkRemove fontSize="small" color="action" />,
        link: APP_URL+"/meus-pedidos"
    },
    {
        title: "Minhas ofertas",
        icon: <BookmarkAdd fontSize="small" color="action" />,
        link: APP_URL+"/minhas-ofertas"
    }
]
