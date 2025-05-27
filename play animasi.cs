using System.Collections;
using System.Collections.Generic;
using UnityEngine;
public class PlayAnimasi : MonoBehaviour
{
// Start is called before the first frame update
private Animator animator; //Untuk animasinya
void Start()
{
animator = GetComponent<Animator>();
}
public void PilihanButton(int gerakan)
{
if (gerakan == 1) animator.SetTrigger("Fly");
if (gerakan == 2) animator.SetTrigger("Walk");
if (gerakan == 3) animator.SetTrigger("Run");
}
}
