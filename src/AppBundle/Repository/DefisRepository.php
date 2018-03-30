<?php

namespace AppBundle\Repository;

/**
 * DefisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DefisRepository extends \Doctrine\ORM\EntityRepository
{
    public function FindDisc($id)
    {
        $req = $this->getEntityManager()->createQuery(
            "select  m from AppBundle:Discussion m where m.idDefis=:p"
        )->setParameter('p',$id);
        return $req->getResult();

    }
    public function existBattle($idf , $idu)
    {
        $req = $this->getEntityManager()->createQuery(
            " SELECT COUNT(u) as number
             FROM AppBundle:MembresDefis u
                   WHERE u.idDefis=:p and u.idUser=:t"
        )->setParameter('p',$idf)
        ->setParameter('t',$idu);
        return $req->getResult();

    }
    public function FindUsers($id)
    {
        $req = $this->getEntityManager()->createQuery(
            "select DISTINCT m from AppBundle:MembresDefis m where m.idDefis=:p"
        )->setParameter('p',$id);
        return $req->getResult();

    }
    public function updatememebermax ($id)
    {
        $req = $this->getEntityManager()->createQuery(

            "update AppBundle:Defis m set m.maxmember = m.maxmember - 1
     where m.id=:p")
            ->setParameter('p',$id);

        return $req->execute();
    }

    public function check ($idf , $idu)
    {

        $req = $this->getEntityManager()->createQuery(
            "select  m from AppBundle:CheckIn m where m.idDefis=:p

                  and m.idUser=:i and m.date = CURRENT_DATE()"
        )->setParameter('p',$idf)
        ->setParameter('i',$idu);
        return $req->getResult();
    }

}
