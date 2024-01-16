import { Inter } from 'next/font/google'
import styles from '@/styles/Home.module.css'
import { useEffect, useState } from 'react'

const inter = Inter({ subsets: ['latin'] })

export default function Home() {
    const [get, setGet] = useState<any>(null)
    const [post, setPost] = useState<any>(null)

    useEffect(() => {
        fetch('http://localhost:8000/api/teste-get')
            .then(res => res.json())
            .then(res => {
                console.log(res);
                setGet(res.mensagem)
            })
        fetch('http://localhost:8000/api/teste-post',{
            method: 'POST',
            body: JSON.stringify({nome: 'teste', email: 'teste@teste.com', senha: '123456'}),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
        .then(res => {
                console.log(res);
                setPost(res.mensagem)
            })
        })

  return (
      <main className={`${styles.main} ${inter.className}`}>
        <p>Get: {get}</p>
        <p>Post: {post}</p>
      </main>
  )
}
